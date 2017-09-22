<?php

require_once('common.php');

$form = new \AmavisWblist\Form\Policy();

if(isset($_POST)) {
    if($form->isValid($_POST)) {
        var_dump($form->getValues());
        die('posted ok!');
    }
}

$smarty = new \AmavisWblist\Template();
$smarty->assign('form', $form);
$smarty->display('policy.tpl');
