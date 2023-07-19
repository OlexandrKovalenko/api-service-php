<?php 

namespace WebApp\Models;

use WebApp\Core\Model;

class Auth extends Model {
    
    protected $table = 'users';

    function checkUser($email) {
        $params = [
            'email' => $email,
        ];
        $result = $this->db->row('SELECT * FROM users WHERE email = :email', $params);
        return $result;
    }
}