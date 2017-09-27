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

$template = new \AmavisWblist\Template();
$template->assign('form', $form);
$template->display('whitelistblacklist.tpl');