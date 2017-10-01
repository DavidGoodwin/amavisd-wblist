<?php

require_once('common.php');

$database = new \AmavisWblist\Database();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Unsupported request");
}

$recipient = $database->queryOne("SELECT * FROM users WHERE id = ?", [$_POST['id']]);

if (empty($recipient)) {
    die('recipient not found');
}

$id = $recipient['id'];

$database->beginTransaction();
$database->query("DELETE FROM wblist WHERE rid = ?", [$id]);
$database->query("DELETE FROM users WHERE id = ?", [$id]);

$database->commit();

\AmavisWblist\Flash::addMessage("Recipient deleted");
header("Location: listrecipient.php");

