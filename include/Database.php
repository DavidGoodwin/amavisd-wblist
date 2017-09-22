<?php
/**
 * Created by PhpStorm.
 * User: palepurple
 * Date: 22/09/2017
 * Time: 21:32
 */

namespace AmavisWblist;


class Database
{
    /* @var \PDO */
    private $db;

    /**
     * @var array requires DB_DSN variable, and probably DB_USERNAME and DB_PASSWORD.
     */
    private $config;

    public function __construct(array $config = []) {

        if(empty($config)) {
            $configObject = \AmavisWblist\Config::getInstance();
            $this->config = $configObject->getAll();
        }

        $this->connect();

    }


    public function query($sql, $params = [])
    {

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * @return \PDO
     */
    public function connect()
    {

        $config = $this->config;

        $dsn = $config['DB_DSN'];
        $db_user = $config['DB_USERNAME'];
        $db_password = $config['DB_PASSWORD'];

        $pdo = new \PDO($dsn, $db_user, $db_password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}