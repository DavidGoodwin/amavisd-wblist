<?php

require_once('common.php');

if (empty($_GET['mail_id'])) {
    \AmavisWblist\Flash::addError('no mail_id specified');
    header("Location: index.php");
    exit(0);
}

$mail_id = $_GET['mail_id'];

$database = new \AmavisWblist\Database();
$template = new \AmavisWblist\Template();


$mail = $database->queryOne('SELECT * FROM quarantine WHERE mail_id = ?', [$mail_id]);

if (empty($mail)) {
    \AmavisWblist\Flash::addError("Mail not found");
    header("Location: amavis-recent-mail.php");
    exit(0);
}

if (is_resource($mail['mail_text'])) {
    $mail['mail_text'] = stream_get_contents($mail['mail_text']);

}

$template->assign('mail_raw', $mail['mail_text']);

$pmail = new PhpMimeMailParser\Parser();
$pmail->setText($mail['mail_text']);

$text = $pmail->getMessageBody('text');
$html = $pmail->getMessageBody('html');

$template->assign('mail_plain', $text);
$template->assign('mail_html_safe', strip_tags($html)); // don't trust html?

$attachments = [];
foreach ($pmail->getAttachments() as $attachment) {
    $attachments[] = ['filename' => $attachment->getFilename(), 'content_type' => $attachment->getContentType()];
}
$template->assign('attachments', $attachments);

$template->setTitle("Quarantine View");

$template->display('quarantine-view.tpl');
