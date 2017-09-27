<?php

require_once('common.php');


$form  = new \AmavisWblist\Form\Sender();

$database = new \AmavisWblist\Database();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($form->isValid($_POST)) {
        $data = $form->getValues();
        if(empty($data['id'])) {
            // insert
            unset($data['id']);
            $database->query('INSERT INTO mailaddr (priority, email) VALUES (:priority,:email)', $data);
        }
        else {
            $database->query("UPDATE mailaddr SET priority = :priority, email = :email WHERE id = :id", $data);
            // update
        }
        header("Location: listsender.php");
        exit(0);
    }
}

if(isset($_GET['id'])) {
    $sender = $database->queryOne('SELECT * FROM mailaddr WHERE id = ?', [$_GET['id']]);
    if(empty($sender)) {
        die('invalid sender?');
    }

    if(is_resource($sender['email'])) {
        $sender['email'] = stream_get_contents($sender['email']);
    }
    $form->isValid($sender);
}

$template = new \AmavisWblist\Template();
$template->assign('form', $form);
$template->display('sender.tpl');
