<?php

require_once(dirname(__FILE__) . '/../vendor/autoload.php');

/* gives us $config */
require_once(dirname(__FILE__) . '/../config.php');

$c = \AmavisWblist\Config::getInstance();
$c->setConfig($config);


session_start();
