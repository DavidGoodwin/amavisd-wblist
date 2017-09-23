<?php

require_once('common.php');

$form = new \AmavisWblist\Form\Policy();

if (!empty($_POST)) {
    if ($form->isValid($_POST)) {

        $data = $form->getValues();
        $qmarks = [];
        $values = [];
        $updates = [];
        foreach ($data as $key => $value) {
            if($key == 'id') {
                continue;
            }
            if ($value === '') {
                $value = null;
            }

            $fields[] = $key;
            $qmarks[] = ":$key";
            $values[$key] = $value;
            $updates[] = " $key = :$key ";
        }


        $fields = implode(',', $fields);
        $qmarks = implode(',', $qmarks);
        $updates = implode(',', $updates);


        if (isset($_POST['id']) && $_POST['id'] > 0) { // blindly assume an update
            $sql = "UPDATE policy SET {$updates} WHERE id = :id";
            $values['id'] = (int)$_POST['id'];
        } else {
            $sql = "INSERT INTO policy ($fields) VALUES ($qmarks)";
        }
        $database = new \AmavisWblist\Database();
        $database->query($sql, $values);
    }

}

$smarty = new \AmavisWblist\Template();
$smarty->assign('form', $form);
$smarty->display('policy.tpl');
