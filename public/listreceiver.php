<?php


 require_once('common.php');


 $database = new \AmavisWblist\Database();
 $template = new \AmavisWblist\Template();


 $recievers = $database->query('SELECT * FROM users ORDER BY priority, policy_id, fullname');

 foreach($recievers as $key => $row) {
     if(is_resource($row['email'])) {
         $recievers[$key]['email'] = stream_get_contents($row['email']);
     }
 }



 $template->assign('receivers', $recievers);

$template->assign('priorities', range(1,100) );

$policies = $database->query('SELECT * FROM policy ORDER BY policy_name');

$template->assign('policies', $policies);

 $template->display('listreceiver.tpl');



