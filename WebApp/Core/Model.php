<?php

namespace WebApp\Core;

use WebApp\lib\Db;
use WebApp\Traits\DatabaseOperationsTrait;

abstract class Model {

    use DatabaseOperationsTrait;
    public $db;

    function __construct() {
        $this->db = new Db;
    }
}