<?php

require_once('common.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Invalid Request");
}

if (!isset($_POST['rid']) || !isset($_POST['sid'])) {
    die('invalid request');
}

$rid = (int)$_POST['rid'];
$sid = (int)$_POST['sid'];

$params = ['rid' => $rid, 'sid' => $sid];

$database = new \AmavisWblist\Database();

$row = $database->queryOne("SELECT * FROM wblist WHERE rid = :rid AND sid = :sid", $params);

if (empty($row)) {
    \AmavisWblist\Flash::addError("Nothing to delete; wblist entry already removed?");
}
else {
    $database->query("DELETE FROM wblist WHERE rid = :rid AND sid = :sid", $params);
    \AmavisWblist\Flash::addMessage("wblist entry removed");
}

header("Location: listwhitelistblacklist.php");