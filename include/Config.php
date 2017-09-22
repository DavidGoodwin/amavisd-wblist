<?php

namespace AmavisWblist;

class Config
{

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function getAll()
    {
        return $this->config;
    }

    public function has($key)
    {
        return isset($this->config[$key]);
    }

    public function get($key)
    {
        if ($this->has($key)) {
            return $this->config[$key];
        }
        return null;
    }
}