<?php

require_once('common.php');

$db = new \AmavisWblist\Database();
$template = new \AmavisWblist\Template();

$template->setTitle("Recent Email");

if (!empty($_GET)) {
    $_SESSION['last_params'] = $_GET;
}

$quaranatined_only = false;
$header = array();
$show_limit_sql = '';

if (!empty($_GET['show'])) {
    if ($_GET['show'] == 'week') {
        $header[] = "From the last week";
        $show_limit_sql = " ";
    }
    if ($_GET['show'] == 'day') {
        $header[] = "Last DAY";
        $show_limit_sql = " AND now() - time_iso < INTERVAL '1 days'";
    }
} else {
    $header[] = "Last 60 minutes only";
    $show_limit_sql = "AND now() - time_iso < INTERVAL '60 minutes'";
}

$level_limit_sql = '';

if (!empty($_GET['level'])) {
    $level = (int)$_GET['level'];
    $header[] = "Spam level >= $level";
    $level_limit_sql = " AND bspam_level >= $level ";
}

$ORDERS = array(
    'msgs.time_num' => 'Time',
    'r' => 'Recipient',
    's' => 'Sender',
    'subj' => 'Subject',
);

$order_sql = "ORDER BY msgs.time_num DESC ";

if (!empty($_GET['order'])) {
    $order = $_GET['order'];
    $direction = "ASC";
    if (isset($ORDERS[$order])) {
        if (isset($_GET['direction']) && $_GET['direction'] == "DESC") {
            $direction = "DESC";
        }
        $order_sql = " ORDER BY $order ";
        $header[] = "Ordered by {$ORDERS[$order]} $direction ";
    }
    $order_sql .= $direction;
}

$quarantined_only = false;
$quaranatined_only_sql = '';
if (!empty($_GET['quarantined_only']) && $_GET['quarantined_only'] == 'yes') {
    $quarantined_only = true;
    $header[] = "Quarantined";
    $quaranatined_only_sql = "AND quar_type = 'Q' ";
}


$subject_sql = '';
if (!empty($_GET['subject'])) {
    $header[] = " Subject matching " . htmlspecialchars($_GET['subject']);
    $subject = $_GET['subject'];
    $subject = $db->quote("%$subject%");
    $subject_sql = "AND msgs.subject ILIKE $subject ";
}
$CONTENT_VALUES = array('A' => 'All', 'V' => 'Virus', 'B' => 'Banned', 'S' => 'Spam (kill)', 's' => 'Spammy', 'M' => 'Bad Mime Headers', 'H' => 'Bad Headers', 'O' => 'Oversized', 'C' => 'Clean');

$content_sql = '';

if (!empty($_GET['content'])) {
    $content = $_GET['content'];
    if ($content != 'A' && isset($CONTENT_VALUES[$content])) {
        $content_sql = "AND msgs.content = '{$_GET['content']}' ";
    }
    $header[] = "Type : {$CONTENT_VALUES[$content]} ";
}

$sql = "SELECT now()-time_iso AS age, 
            SUBSTRING(policy,1,2) as pb, 
            msgs.content AS c, 
            dsn_sent as dsn, 
            ds, 
            msgs.secret_id AS release_key,
            bspam_level AS level, 
            size, 
            time_iso,
	    msgs.mail_id,
            msgs.quar_type as quar_type,
            msgs.quar_loc as quar_loc,
            msgs.message_id as message_id,
            SUBSTRING(sender.email,1,25) AS s, 
            SUBSTRING(recip.email,1,25)  AS r, 
            SUBSTRING(msgs.subject,1,35) AS subj 
        FROM msgs LEFT JOIN msgrcpt ON msgs.mail_id=msgrcpt.mail_id 
        LEFT JOIN maddr AS sender ON msgs.sid=sender.id 
        LEFT JOIN maddr AS recip  ON msgrcpt.rid=recip.id 
        WHERE msgs.content IS NOT NULL $content_sql $subject_sql $level_limit_sql $show_limit_sql $quaranatined_only_sql $order_sql";

#  content    char(1),                   -- content type: V/B/S/s/M/H/O/C: -- virus/banned/spam(kill)/spammy(tag2)/bad-mime/bad-header/oversized/clean


try {
    $rows = $db->query($sql);
}
catch(\PDOException $e) {
    die("DB query failed: $sql ... " . $e->getMessage());
}




$template->assign('header', $header);

$template->assign('quarantined_only', $quaranatined_only);


$form = new \AmavisWblist\Form\QuarantineSearch();
$form->setContentOptions($CONTENT_VALUES);


//$form->getElement('content')->setMultiOptions($CONTENT_VALUES);

$form->isValid($_GET);

$template->assign('form', $form);

$template->assign('_up_down_msgs_time_num', _up_down('msgs.time_num'));
$template->assign('_up_down_s', _up_down('s'));
$template->assign('_up_down_r', _up_down('r'));
$template->assign('_up_down_subj', _up_down('subj'));





foreach($rows as $k => $r) {

    if (is_resource($r['mail_id'])) {
        $mail_id = stream_get_contents($r['mail_id']);
    } else {
        $mail_id = $r['mail_id'];
    }

    $message_id = $r['message_id'];
    $base64_message_id = urlencode(base64_encode($message_id));

    $r['mail_id'] = $mail_id;
    $r['base64_message_id'] = $base64_message_id;


    $r['recipient'] = stream_get_contents($r['r']);
    $r['sender'] = stream_get_contents($r['s']);

    $r['content'] = _translate_content($r['c']);
    $r['delivery_status'] = _translate_content($r['ds']);


    $rows[$k] = $r;
}


$template->assign('rows', $rows);


$template->display('amavis-recent-mail.tpl');




function _up_down($field)
{
    global $ORDERS;
    $url = $_SERVER['SCRIPT_NAME'];

    $params = [];
    if(!empty($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $params);
    }

    $params['order'] = $field;
    $params_down = $params;
    $params_up = $params;

    $params_up['direction'] = 'ASC';
    $params_down['direction'] = 'DESC';

    $query_string_up = http_build_query($params_up);
    $query_string_down = http_build_query($params_down);
    if (isset($ORDERS[$field])) {
        return "<a href='$url?$query_string_up'>&uarr;</a> <a href='$url?$query_string_down'>&darr;</a>";
    }
    return '';
}






function _translate_content($c)
{
    /* Note: duplication with $CONTENT_VALUES */
    if ($c == 'A') {
        return false;
    }
    if ($c == 'V') {
        return 'Virus';
    }
    if ($c == 'B') {
        return 'Banned';
    }
    if ($c == 'S') {
        return 'Spam Killed';
    }
    if ($c == 's') {
        return 'Spammy';
    }
    if ($c == 'M') {
        return 'Bad Mime';
    }
    if ($c == 'H') {
        return 'Bad Header';
    }
    if ($c == 'O') {
        return 'Oversized';
    }
    if ($c == 'C') {
        return 'Clean OK';
    }
    return $c;
}

function _translate_ds($c)
{
    if ($c == 'P') {
        return 'Pass';
    }
    if ($c == 'D') {
        return 'Discard';
    }
    if ($c == 'F') {
        return 'Temp fail';
    }
    return $c;
}
