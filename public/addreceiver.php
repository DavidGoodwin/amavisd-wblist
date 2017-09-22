<?php

require_once('common.php');

$form = new AmavisWblist\Form\Receiver();

$db = new \AmavisWblist\Database();
$rows = $db->query('SELECT id,policy_name FROM policy');

$form->setPolicys($rows);


$template = new \AmavisWblist\Template();
$template->assign('form', $form);
$template->display('receiver.tpl');
