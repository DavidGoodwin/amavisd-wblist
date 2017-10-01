<?php

require_once('common.php');

$form = new AmavisWblist\Form\Receiver();

$db = new \AmavisWblist\Database();
$rows = $db->query('SELECT id,policy_name FROM policy');

$form->setPolicys($rows);
$template = new \AmavisWblist\Template();
$template->setTitle("Recipient");
$template->assign('show_wblist', false);

if(isset($_GET['id'])) {
    $row = $db->queryOne("SELECT * FROM users WHERE id = ?", [$_GET['id']]);
    if(is_resource($row['email'])) {
        $row['email'] = stream_get_contents($row['email']);
    }
    $form->isValid($row);

    $id = $row['id'];
    
    $wblists = $db->query("select distinct wblist.sid,mailaddr.email,wblist.wb from wblist,mailaddr where wblist.rid=:rid and wblist.sid=mailaddr.id", ['rid' => $id]);
    foreach($wblists as $key => $row) {
        if(is_resource($row['email'])) {
            $wblists[$key]['email'] = stream_get_contents($row['email']);
        }
    }

    $template->assign('show_wblist', true);
    $template->assign('wblist', $wblists);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($form->isValid($_POST)) {
        $data = $form->getValues();

        if(isset($data['id'])) {
            // update?
            $add_updated = "updated";
            $sql = "UPDATE users SET policy_id = :policy_id, priority = :priority, email = :email, fullname = :fullname WHERE id = :id";
        }
        else {
            // insert?
            $add_updated = "added";
            $sql = "INSERT into users (id, priority, policy_id, email, fullname) VALUES (null, :priority, :policy_id, :email, :fullname)";
        }

        $database = new \AmavisWblist\Database();
        $database->query($sql, $data);

        \AmavisWblist\Flash::addMessage("Recipient $add_updated ");

        header('Location: listrecipient.php');
        exit(0);
    }
}
$template->assign('form', $form);
$template->display('recipient.tpl');
