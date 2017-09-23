<?php

require_once('common.php');

$form = new AmavisWblist\Form\Receiver();

$db = new \AmavisWblist\Database();
$rows = $db->query('SELECT id,policy_name FROM policy');

$form->setPolicys($rows);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($form->isValid($_POST)) {
        $data = $form->getValues();

        if(isset($data['id'])) {
            // update?
            $sql = "UPDATE users SET priority = :priority, email = :email, fullname = :fullname WHERE id = :id";
        }
        else {
            // insert?
            $sql = "INSERT into users (id, priority, policy_id, email, fullname) VALUES (null, :priority, :policy_id, :email, :fullname)";
        }

        $database = new \AmavisWblist\Database();
        $database->query($sql, $data);

    }
}
$template = new \AmavisWblist\Template();
$template->assign('form', $form);
$template->display('receiver.tpl');
