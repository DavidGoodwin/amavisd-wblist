<?php

$config = [
    'DB_DSN' => "pgsql:host=192.168.0.66;dbname=amavis",
    'DB_USERNAME' => "dg",
    "DB_PASSWORD" => "gingerdog",
    "RELEASE_DIR" => '/srv/amavis/release/'
    "in_archive" => false, // replace with a closure like function($message_id) { ... return $mail_array }
];

// allow this to orderride config...
$local_config = dirname(__FILE__) . '/config.local.php';
if (file_exists($local_config) && is_readable($local_config)) {
    require_once($local_config);
}

