<?php

$config = [
    'DB_DSN' => "pgsql:host=192.168.0.66;dbname=amavis",
    'DB_USERNAME' => "dg",
    "DB_PASSWORD" => "gingerdog",
    "RELEASE_DIR" => '/srv/amavis/release/',
    "TRAINING_DIR" => '/srv/amavis/training/',
    "in_archive" => false, // replace with a closure like function(array $message_id_list) { return [ 0 => ['message_id' => 'x', 'in_archive' => true, 'url' => '??' ], 1 => [ ..... ] .... ]};
    "get_from_archive" => false, // replace with a closure like function($message_id) { return ['mail_text' => 'raw boy', 'mail_from' => 'smtp return path', 'mail_to' => 'smtp to', 'subject' => 'whatever']; };
];

/*
    $config['in_archive'] = function($list_of_message_ids) { 
        $retval = [];
        foreach($list_of_message_ids as $k => $message_id) {
            // some sort of db query here.
            $retval[$k] = ['message_id' => $message_id, 'in_archive' => true, 'url' => $url ];
        }
        return $retval;
    });

    $config['get_from_archive'] = function($single_message_id) { 
        return ['mail_text' => 'full raw email', 'mail_from' => 'smtp-sender', 'mail_to' => 'smtp-recipient', 'subject' => 'whatever' ];
    });
 */
// allow this to orderride config...
$local_config = dirname(__FILE__) . '/config.local.php';
if (file_exists($local_config) && is_readable($local_config)) {
    require_once($local_config);
}

