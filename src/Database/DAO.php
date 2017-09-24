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
        $connection->connect();
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

    protected function fetchAll(string $sql, array $input_parameters = [], int $fetchStyle = PDO::FETCH_ASSOC):array {
        $stmt = $this->prepare($sql);
        $stmt->execute($input_parameters);
        return $stmt->fetchAll($fetchStyle);
    }
}