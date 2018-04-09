<?php

require_once(dirname(__FILE__) . '/common.php');

$configObject = \AmavisWblist\Config::getInstance();
$config = $configObject->getAll();


if(!isset($_GET['message_id'])) {
	die("Missing message_id");
}


/* @TODO change database to take 3 params (dsn, username, password), then it'd be reusable here ... */

$message_id = $_GET['message_id'];
$message_id = base64_decode($message_id);
$row = $config['in_archive']($message_id);
if(is_array($row)) {
	echo "<pre>" . htmlentities($row['message'], ENT_QUOTES, 'UTF-8', false) . "</pre>";
}
exit(0);
