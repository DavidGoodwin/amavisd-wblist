<?php

require_once('common.php');

$configObj = \AmavisWblist\Config::getInstance();

$config = $configObj->getAll();

$sa_learn_dir = $configObj->get('TRAINING_DIR');

if(empty($sa_learn_dir) || !is_writeable($sa_learn_dir)) {
    echo json_encode(array('status' => 'fail', 'message' => 'TRAINING_DIR invalid; check config'));
    exit(1);
}

if(empty($_POST['mail_id']) && empty($_POST['message_id'])) {
    echo json_encode(array('status' => 'fail', 'message' => 'mail_id or message_id ? '));
    exit(1);
}

if(!empty($_POST['mail_id'])) {
    // in quarantine/amavis db
    $mail_id = $_POST['mail_id'];
    $db = new \AmavisWblist\Database();

    $mail = $db->queryOne("SELECT * FROM quarantine WHERE mail_id = ? LIMIT 1", [$mail_id]);

    if(!empty($mail) && is_resource($mail['mail_text'])) {
        $mail_body = stream_get_contents($mail['mail_text']);
    }
    else {
        echo json_encode(arraY('status' => 'fail', 'message' => 'not in quarantine?'));
        exit(1);
    }
}
elseif(!empty($_POST['message_id'])) {

    $message_id = $_POST['message_id'];
    $message_id = base64_decode($message_id);


    if(!is_callable($config['get_from_archive'])) {
        echo json_encode(array('status' => 'fail', 'message' => 'config wrong (no archive support)'));
        exit(0);
    } 
    
    $mail = $config['get_from_archive']($message_id);

    $mail_body = $mail['mail_text'];
}
else {
    echo json_Encode(array('status' => 'fail', 'message' => 'no mail_id/message_id'));
    exit(0);
}

$what = 'ham';
if(isset($_POST['mark_as']) && $_POST['mark_as'] == 'spam') {
    $what = 'spam';
}

file_put_contents($sa_learn_dir . '/' . md5($mail) . '-learn-' . $what, $mail_body);

echo json_encode(array('status' => 'success', 'message' => "Added to $what queue"));
exit(0);
