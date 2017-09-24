<?php

namespace Sogut\Database;

use Sogut\Core\IDBConnection;
use PDO;

abstract class DAO
{
    private $connection;

    public function __construct(IDBConnection $connection)
    {
        $this->connection = $connection;
    }

    public function count(string $tableName) : int
    {
        $stmt = $this->prepare("SELECT COUNT(1) as anzahl FROM $tableName");
        $stmt->execute();
        return (int)$stmt->fetch(PDO::FETCH_ASSOC)["anzahl"];
    }

    protected static function placeholders(array $array) : string
    {
        return rtrim(str_repeat('?, ', count($array)), ', ');
    }

    protected function prepare(string $statement) : \PDOStatement
    {
        return $this->connection->getDb()->prepare($statement);
    }

    protected function execute(string $sql) : int
    {
        $this->connection->getDb()->exec($sql);
    }

    public function setConnection(IDBConnection $connection)
    {
        $this->connection = $connection;
    }

}