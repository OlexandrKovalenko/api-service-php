<?php

namespace WebApp\Core;

use WebApp\lib\Db;
use WebApp\Traits\DatabaseOperationsTrait;
use WebApp\Services\ApiServices;

abstract class Model {

    use DatabaseOperationsTrait;
    public $db;
    public $api;

    function __construct() {
        $this->db = new Db;
        $this->api = new ApiServices;
    }
}