<?php
require_once('common.php');


$database = new \AmavisWblist\Database();
$template = new \AmavisWblist\Template();


$senders = $database->query('SELECT 
      wblist.rid as rid,
      wblist.sid as sid,
      mailaddr.email as sender_email,
      users.email as recipient_email,
      users.fullname as recipient_name,
      wblist.wb as blacklist_whitelist,
      users.priority as recipient_priority
      FROM wblist
      LEFT JOIN mailaddr ON (mailaddr.id = wblist.sid) 
      LEFT JOIN users ON (users.id = wblist.rid)
      ORDER BY users.priority DESC');

foreach ($senders as $key => $row) {
    foreach(['recipient_email', 'sender_email'] as $field) {
        if(is_resource($row[$field])) {
            $senders[$key][$field] = stream_get_contents($senders[$key][$field]);
        }
    }
}


$template->assign('senders', $senders);
$template->assign('priorities', range(1, 30));

$template->display('listwhitelistblacklist.tpl');



