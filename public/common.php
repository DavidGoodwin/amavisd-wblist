<?php

require_once(dirname(__FILE__) . '/../vendor/autoload.php');

$config = [
    // Path on the server ( https://my.site/BASEPATH )
    'BASEPATH' => '/wblist',
    'DB_DSN' => "pgsql:host=192.168.0.66;dbname=amavis",
    'DB_USERNAME' => "dg",
    "DB_PASSWORD" => "gingerdog",

];

// allow this to orderride config...
$local_config = dirname(__FILE__) . '/config.local.php';
if (file_exists($local_config) && is_readable($local_config)) {
    require_once($local_config);
}

$c = \AmavisWblist\Config::getInstance();
$c->setConfig($config);


session_start();
