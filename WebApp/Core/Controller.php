<?php
namespace WebApp\Core;

use WebApp\Core\View;
use WebApp\Services\ApiServices;

class Controller {

    public $route;
    public $view;
    public $model;

    public $token;

    function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);

        if (method_exists($this, 'before')) {
            
        }
    }

    public function loadModel($name) {
        $path = 'WebApp\\Models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }
}