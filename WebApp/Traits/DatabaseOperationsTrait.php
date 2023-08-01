<?php

namespace WebApp\Traits;

use PDO;
use WebApp\lib\Db;

trait DatabaseOperationsTrait
{
    public function insert($table, array $data)
    {
        $db = (new Db())->getDB();
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $db->prepare($query);

        foreach ($data as $key => $value) {
            if($key == 'password') $value = password_hash($value, PASSWORD_DEFAULT);
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function update($table, array $data, array $conditions)
    {
        $db = (new Db())->getDB();
        $values = implode(', ', array_map(fn ($key) => "$key = :$key", array_keys($data)));
        $where = implode(' AND ', array_map(fn ($key) => "$key = :$key", array_keys($conditions)));

        $query = "UPDATE $table SET $values WHERE $where";
        $stmt = $db->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function search($table, array $conditions, $first)
    {
        $db = (new Db())->getDB();
        $columns = implode(', ', array_keys($conditions));
        $values = implode(' AND ', array_map(fn ($key) => "$key = :$key", array_keys($conditions)));

        $query = "SELECT * FROM $table WHERE $values";
        $stmt = $db->prepare($query);
        foreach ($conditions as $key => $value) {

            $stmt->bindValue(":$key", $value);
        }
        
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = $first && !empty($result) ? $result[0] : $result;
        return $result;
    }

    public function getUserById($id) {
        return $this->search('users', ['id' => $id], 'first');
    }
}