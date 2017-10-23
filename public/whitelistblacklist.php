<?php
require_once('common.php');

$form = new \AmavisWblist\Form\WhitelistBlacklist();
$database = new \AmavisWblist\Database();

$rows =  $database->query('SELECT id, email FROM mailaddr ORDER BY email, priority ASC');
$senders = [];
foreach($rows as $row) {

    if(is_resource($row['email'])) {
        $email = stream_get_contents($row['email']);
    }
    else {
        $email = $row['email'];
    }
    $senders[$row['id']] = $email; // can we read that here?
}

$form->setSenders($senders);

$rows = $database->query('SELECT id, email, fullname FROM users ORDER BY email, priority ASC');

$recipients = [];
foreach($rows as $row) {

    if(is_resource($row['email'])) {
        $email = stream_get_contents($row['email']);
    }
    else {
        $email = $row['email'];
    }

    $recipients[$row['id']] = $email . " ({$row['fullname']}) ";
}

$form->setRecipients($recipients);


if($_SERVER['REQUEST_METHOD'] == 'POST' && $form->isValid($_POST)) {

        $data = $form->getValues();
        $sid = $data['sid'];
        $rid = $data['rid'];
        $wb = $data['wb'];

        $existing = $database->queryOne('SELECT * FROM wblist WHERE rid = :rid AND sid = :sid ', ['rid' => $rid, 'sid' => $sid]);
        if (!empty($existing)) {
            $sql = "UPDATE wblist SET wb = :wb WHERE rid = :rid and sid = :sid";
            \AmavisWblist\Flash::addMessage("Updated entry in whitelist/blacklist");
        } else {
            $sql = "INSERT INTO wblist (rid, sid, wb) VALUES (:rid, :sid, :wb)";
            \AmavisWblist\Flash::addMessage("Added entry to whitelist/blacklist");
        }
        $database->query($sql, ['sid' => $sid, 'rid' => $rid, 'wb' => $wb]);
}

$template = new \AmavisWblist\Template();
$template->setTitle("Whitelist/Blacklist Entry");
$template->assign('form', $form);
$template->display('whitelistblacklist.tpl');
