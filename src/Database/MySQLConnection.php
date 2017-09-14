<?php

namespace Sogut\Database;

use Sogut\Core\Config;
use Sogut\Core\IDBConnection;
use PDO;
use PDOException;

class MySQLConnection implements IDBConnection
{
    /** @var PDO */
    private $db;

    public function connect()
    {
        if (empty($this->db)) {
            try {
                $this->db = new PDO('mysql:host=' . Config::getInstance()->host . ';dbname=' . Config::getInstance()->dbname . ';charset=utf8', Config::getInstance()->user, Config::getInstance()->pass);
            } catch (PDOException $e) {
                die("Error!:<br>" . $e->getMessage());
            }
        }
    }

    public function disconnect()
    {
        $this->db = null;
    }

    /**
     * @return PDO
     */
    public function getDb() : PDO
    {
        return $this->db;
    }
}
