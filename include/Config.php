<?php

namespace AmavisWblist;

class Config
{

    /**
     * @var self
     */
    private static $instance;


    /**
     * @var array
     */
    private $config;

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->config = [];
    }

    /**
     * @param array $config
     * @return void
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->config;
    }

    /**
     * @return bool
     * @param string $key
     */
    public function has($key)
    {
        return isset($this->config[$key]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->config[$key];
        }
        return null;
    }
}
