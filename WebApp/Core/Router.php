<?php

namespace WebApp\Core;

use WebApp\Core\View;

class Router {

    protected $subDomain = '/cus-services/';
    protected $routes = [];
    protected $params = [];

    function __construct() {
        $arr = require 'WebApp/Config/routes.php';

        foreach($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        //$url = str_replace($this->subDomain, '', $_SERVER['REQUEST_URI']);

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
            $path = 'WebApp\\Controllers\\'.ucfirst($this->params['controller']).'Controller';
            if(class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                }
                else {
                    View::errorCode(404);
                }
            }
            else {
                View::errorCode(404);
            }
        }
        else {
            View::errorCode(404);
        }
    }

}