<?php

require_once('common.php');


$template = new \AmavisWblist\Template();
$database = new \AmavisWblist\Database();


$rows = $database->query('SELECT * FROM policy');


$template->assign('rows', $rows);

$template->display('listpolicy.tpl');
