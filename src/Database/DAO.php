<?php

namespace DAO\Database;

use Sogut\Core\MySQLConnection;
use PDO;

abstract class DAO
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = new MySQLConnection();
    }

    protected static function placeholders($array)
    {
        return rtrim(str_repeat('?, ', count($array)), ', ');
    }

    protected function prepare($statement)
    {
        return $this->connection->getDb()->prepare($statement);
    }

    protected function execute($sql)
    {
        $this->connection->getDb()->exec($sql);
    }

    public function count($tableName)
    {
        $stmt = $this->prepare("SELECT COUNT(1) as anzahl FROM $tableName");
        $stmt->execute();
        return (int)$stmt->fetch(PDO::FETCH_ASSOC)["anzahl"];
    }

    public function deleteEntry($tableName, $primaryKeys)
    {
        $columns = $this->getColumns($tableName);
        $primaryColumns = [];
        foreach ($columns as $column) {
            if ($column['Key'] === "PRI") {
                $primaryColumns[] = $column['Field'];
            }
        }

        $whereConditions = [];
        foreach ($primaryColumns as $primaryColumn) {
            $whereConditions[] = $primaryColumn . "=?";
        }

        $stmt = $this->prepare("DELETE FROM $tableName WHERE " . join(" AND ", $whereConditions));

        $stmt->execute($primaryKeys);
    }

    public function addEntry($table, $cols = [])
    {
        $stmt = $this->prepare("INSERT INTO $table (" . join(",", array_keys($cols)) . ") VALUES (" . self::placeholders($cols) . ")");
        $stmt->execute(array_values($cols));

        return $this->connection->getDb()->lastInsertId();
    }
}
