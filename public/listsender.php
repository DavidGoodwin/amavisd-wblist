<?php
require_once('common.php');


$database = new \AmavisWblist\Database();
$template = new \AmavisWblist\Template();

$template->setTitle('Sender List');


$senders = $database->query('SELECT * FROM mailaddr ORDER BY priority DESC');

foreach ($senders as $key => $row) {
    if (is_resource($row['email'])) {
        $senders[$key]['email'] = stream_get_contents($row['email']);
    }
}


$template->assign('senders', $senders);
$template->assign('priorities', range(1, 30));

$template->display('listsender.tpl');



