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

        $this->db = $this->connect();
    }


    public function queryOne($sql, $params = []) {
        $rows = $this->query($sql, $params);

        if(sizeof($rows) >= 1) {
            return $rows[0];
        }
        return null;
    }


    public function beginTransaction() {
        return $this->db->beginTransaction();
    }

    public function commit() {
        return $this->db->commit();
    }

    public function rollback() {
        if($this->db->inTransaction()) {
            return $this->db->rollBack();
        }
        return false;
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        catch(\PDOException $e) {
            var_dump($sql);
            var_dump($params);
            var_dump($e->getMessage());
            die('sql query failed.');
        }
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