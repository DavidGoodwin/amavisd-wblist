<?php

require_once('common.php');

$form = new \AmavisWblist\Form\Policy();
$database = new \AmavisWblist\Database();


if (!empty($_POST)) {
    _do_post($form, $_POST);
}

// view policy...
if (isset($_GET['id'])) {
    $policy = $database->queryOne('SELECT * FROM policy WHERE id = ?', [$_GET['id']]);
    $form->isValid($policy);
}

$template = new \AmavisWblist\Template();
$template->setTitle("Policy");
$template->assign('form', $form);
$template->display('policy.tpl');




function _do_post(\AmavisWblist\Form\Policy $form, array $post)
{
    if (!$form->isValid($post)) {
        \AmavisWblist\Flash::addError("Form validation failed; check messages");
        return false;
    }

    $data = $form->getValues();
    $qmarks = [];
    $values = [];
    $updates = [];
    foreach ($data as $key => $value) {
        if ($key == 'id') {
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
        $update = true;
    } else {
        $update = false;
        $sql = "INSERT INTO policy ($fields) VALUES ($qmarks)";
    }

    try {
        $database = new \AmavisWblist\Database();
        $database->query($sql, $values);
    }
    catch(\PDOException $e) {
        error_log("Error trying to create/update policy" . json_encode(['message' => $e->getMessage(), 'sql' => $sql, 'values' => $values]);
        \AmavisWblist\Flash::addError("Update failed; check logs.");
        return false;
    }

    if($update) {
        \AmavisWblist\Flash::addMessage("Policy updated");
    }
    else {
        \AmavisWblist\Flash::addMessage("Policy added");
    }
}
