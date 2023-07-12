<?php
namespace App\Core;

class View {

    public $route;
    public $path;
    public $layout = 'default';

    function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    function render($title, $vars = []) {
        extract($vars);
        $path = 'App/Views/' . $this->path . '.php';
        
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'App/Views/layouts/' . $this->layout . '.php';
        }
        else {
            echo 'View not found: '. $this->path;
        }
    }

    static function errorCode($code) {
        http_response_code($code);
        $path = 'App/Views/errors/' . $code . '.php';

        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    function redirect($url) {
        header('location:' . $url);
        exit;
    }
}