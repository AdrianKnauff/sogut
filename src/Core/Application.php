<?php

namespace Sogut\Core;

use Sogut\Database\MySQLConnection;

class Application
{
    private $connection;

    public function __construct(IDBConnection $connection, Router $router)
    {
        $this->connection = $connection;
//        Router::route();
        $router->route();
    }

    /**
     * @return MySQLConnection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}