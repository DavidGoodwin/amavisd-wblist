<?php

require_once(dirname(__FILE__) . '/common.php');

$configObject = \AmavisWblist\Config::getInstance();
$config = $configObject->getAll();


if (!isset($_GET['message_id'])) {
    die("Missing message_id");
}


/* @TODO change database to take 3 params (dsn, username, password), then it'd be reusable here ... */

$message_id = $_GET['message_id'];
$message_id = base64_decode($message_id);
if (!is_callable($config['get_from_archive'])) {
    die("can't run - need a callable in \$config['get_from_archive'] ... which takes a message_id to retrieve and returns the email. ");
}

$mail = $config['get_from_archive']($message_id);
if (!empty($mail)) {

    echo "<h2>General</h2>";
    echo "<p><strong>From</strong>: " . $mail['mail_from'] . "</p>";
    echo "<p><strong>to</strong> - " . $mail['mail_to'] . " </p>";
    echo "<p>Subject : " . strip_tags($mail['subject']) . "</p>";


    $pmail = new PhpMimeMailParser\Parser();
    $pmail->setText($mail['message']);

    echo "<h2>Attachments</h2>";

    foreach ($pmail->getAttachments() as $attachment) {
        echo " - Attachment: " . $attachment->getFilename();
        echo $attachment->getContentType() . "\n";
    }

    echo "<h2>Headers</h2>";
    list($header_text, $rest) = explode("\n\n", $mail['message']);

    echo "<pre>$header_text</pre>";
    echo "<br/>";


    $text = $pmail->getMessageBody('text');
    $html = $pmail->getMessageBody('html');

    echo "<h2>Text Plain</h2>";
    echo "<pre>" . $text . "</pre>";


    // should really render in some sort of iframe.
    echo "<h2>Html content</h2>";
    echo $html;

}

exit(0);
