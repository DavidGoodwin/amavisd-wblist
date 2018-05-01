<?php

require_once('common.php');

if($_SERVER['REQUEST_METHOD'] != "POST") {
    die("Unsupported request");
}


if(!empty($_POST['mail_id'])) {

    $release_destination = \AmavisWblist\Config::getInstance()->get('RELEASE_DIR');

    $file = tempnam($release_destination, "release");

    $amavis_key = preg_replace('/[^-a-z0-9_]/i', '', $_POST['mail_id']);

    // create a single file per thing to release... a cron job just needs to run every so often
    //
    if(file_put_contents($file, $amavis_key)) {
        echo json_encode(array('status' => 'ok', 'message' => 'Will be released shortly'));
    }
    exit(0);
}

echo json_encode(array('status' => 'fail', 'message' => 'error - missing params', 'post' => $_POST ));

