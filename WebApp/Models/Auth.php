<?php 

namespace WebApp\Models;

use WebApp\Core\Model;
use WebApp\lib\Db;

class Auth extends Model {
    

    protected $table = 'users';

    function checkUserExistence($email) {
        $params = [
            'email' => $email,
        ];
        $result = $this->db->row('SELECT * FROM users WHERE email = :email', $params);
        return $result;
    }

    function get(array $conditions, $first = false) {
        $result = $this->search('users', $conditions, $first);
        return $result;
    }

    function store(array $data) {
        $result = $this->insert('users', $data);
        return $result;
    }
}