<?php

require_once(dirname(__FILE__) . '/../include/Config.php');

$config = [
    // Path on the server ( https://my.site/BASEPATH )
    'BASEPATH' => '/wblist',
    'DB_DSN' => "pgsql:host=192.168.0.66;dbname=amavis",
    'DB_USERNAME' => "dg",
    "DB_PASSWORD" => "gingerdog",

];

foreach ($config as $key => $value) {
    define($key, $value);
}

// allow this to orderride config...
$local_config = dirname(__FILE__) . '/config.local.php';
if (file_exists($local_config) && is_readable($local_config)) {
    require_once($local_config);
}

define("BGCOLOUR", "#ffffff");
define("TITLE", "Amavis Database Manager");

$c = \AmavisWblist\Config::getInstance();
$c->setConfig($config);


$BASEPATH = BASEPATH;
