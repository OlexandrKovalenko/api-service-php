<?php

namespace WebApp\Core;

use WebApp\lib\Db;

abstract class Model {
    public $db;

    function __construct() {
        $this->db = new Db;
    }
}