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
    /**
     * @var \PDO 
     **/
    private $db;

    /**
     * @var array requires DB_DSN variable, and probably DB_USERNAME and DB_PASSWORD.
     */
    private $config;

    /**
     * @param array $config
     */
    public function __construct(array $config = []) {

        if(empty($config)) {
            $configObject = \AmavisWblist\Config::getInstance();
            $config = $configObject->getAll();
        }
        $this->config = $config;
        $this->db = $this->connect();
    }


    /**
     * @param string $sql
     * @param array $params
     * @return array|null
     */
    public function queryOne($sql, $params = []) {

        $rows = $this->query($sql, $params);

        if(sizeof($rows) >= 1) {
            return $rows[0];
        }
        return null;
    }

 

    /**
     * ought to make $string safe for embedding within SQL.... 
     * @param string $string
     * @return string
     */
    public function quote($string) {
        return $this->db->quote($string);
    }

    /**
     * @return bool
     */
    public function beginTransaction() {
        return $this->db->beginTransaction();
    }

    /**
     * @return bool
     */
    public function commit() {
        return $this->db->commit();
    }

    /**
     * @return bool
     */
    public function rollback() {
        if($this->db->inTransaction()) {
            return $this->db->rollBack();
        }
        return false;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        $rows = [];
        $querytype = strtoupper(substr($sql,0,6));
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            switch($querytype) {
                case "INSERT":
                /**
                 * @psalm-suppress RedundantCondition
                 */
                case "UPDATE":
                case "INSERT":
                    $rows_affected = $stmt->rowCount();
                    $rows = array('rows_affected' => $rows_affected );
                    break;
                case "SELECT":
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    break;
                }
        }
        catch(\PDOException $e) {
            throw $e;
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
