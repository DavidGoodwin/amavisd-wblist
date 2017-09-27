<?php

require_once('common.php');

$database = new \AmavisWblist\Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender = $database->queryOne('SELECT * FROM mailaddr WHERE id = ?' [$_POST['id']]);


    if (empty($sender)) {
        die('sender not found');
    }

    $id = $sender['id'];

    $database->beginTransaction();

    $database->query("DELETE FROM wblist WHERE sid = ?", [$id]);
    $database->query("DELETE FROM mailaddr WHERE id = ?", [$id]);

    $database->commit();

    header("Location: listsender.php");
    exit(0);
}
die("Unsupported request");