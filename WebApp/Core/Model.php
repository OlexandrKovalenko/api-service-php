<?php

namespace WebApp\Core;

use WebApp\lib\Db;
use WebApp\Models\Auth;
use WebApp\Traits\DatabaseOperationsTrait;

abstract class Model {

    use DatabaseOperationsTrait;
    public $db;
    public $user;

    function __construct() {
        $this->db = new Db;
    }

}