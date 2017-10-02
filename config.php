<?php

$config = [
    'DB_DSN' => "pgsql:host=192.168.0.66;dbname=amavis",
    'DB_USERNAME' => "dg",
    "DB_PASSWORD" => "gingerdog",
];

// allow this to orderride config...
$local_config = dirname(__FILE__) . '/config.local.php';
if (file_exists($local_config) && is_readable($local_config)) {
    require_once($local_config);
}

