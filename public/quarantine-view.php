<?php

require_once('common.php');

if(empty($_GET['mail_id'])) {
    \AmavisWblist\Flash::addError('no mail_id specified');
    header("Location: index.php");
    exit(0);
}

$mail_id = $_GET['mail_id'];

$database = new \AmavisWblist\Database();
$template = new \AmavisWblist\Template();


$mail = $database->queryOne('SELECT * FROM quarantine WHERE mail_id = ?', [$mail_id]);

if(empty($mail)) {
    \AmavisWblist\Flash::addError("Mail not found");
    header("Location: amavis-recent-mail.php");
    exit(0);
}

if(is_resource($mail['mail_text'])) {
    $mail['mail_text'] = stream_get_contents($mail['mail_text']);

}

$template->setTitle("Quarantine View");

$template->assign('mail', $mail['mail_text']);

$template->display('quarantine-view.tpl');
