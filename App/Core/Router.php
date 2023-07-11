<?php

namespace App\Core;

class Router {

    protected $subDomain = '/cus-services/';
    protected $routes = [];
    protected $params = [];

    function __construct() {
        $arr = require 'App/Config/routes.php';

        foreach($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    function match() {
        //$url = trim($_SERVER['REQUEST_URI'], '/');
        $url = str_replace($this->subDomain, '', $_SERVER['REQUEST_URI']);

        foreach ($this->routes as $route => $params) {
            
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    function run() {
        if ($this->match()) {
            $controller = 'App\\Controllers\\'.ucfirst($this->params['controller']).'Controller.php';
            if(class_exists($controller)) {
                //
            }
            else {
                echo 'Not found: ' . $controller;
            }
        }
        else {
            echo '404 Not found!';
        }
    }

}