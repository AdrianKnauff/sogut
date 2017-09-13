<?php

namespace Sogut\Core;

use Sogut\Database\MySQLConnection;

class Application
{
    private $connection;

    public function __construct()
    {
        $this->connection = new MySQLConnection();
        Router::route();
    }

    /**
     * @return MySQLConnection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}