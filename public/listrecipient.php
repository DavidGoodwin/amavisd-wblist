<?php


require_once('common.php');


$database = new \AmavisWblist\Database();
$template = new \AmavisWblist\Template();

$template->setTitle('Recipient List');

$recipients = $database->query('SELECT * FROM users ORDER BY priority DESC, policy_id, fullname');

foreach ($recipients as $key => $row) {
    if (is_resource($row['email'])) {
        $recipients[$key]['email'] = stream_get_contents($row['email']);
    }
}

$template->assign('recipients', $recipients);

$template->assign('priorities', range(1, 30));

$policies = $database->query('SELECT * FROM policy ORDER BY policy_name');

$template->assign('policies', $policies);

$template->display('listrecipient.tpl');



