<?php 

namespace WebApp\lib;

use PDO;
class Db {

    protected $db;
    function __construct() {
        $config = require 'WebApp/Config/db.php';
        $this->db = new PDO('mysql:host=' .$config['host']. ';dbname=' .$config['dbname']. '', $config['user'], $config['password']);
    }


    /**
     * @var string $sql SQL String
     * @var array $params SQL data params
     */
    function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        
        $stmt->execute();

        return $stmt;
    }

    /**
     * @var string $sql SQL String
     * @var array $params SQL data params
     */
    function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @var string $sql SQL String
     * @var array $params SQL data params
     */
    function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}