<?php
namespace WebApp\Core;

use WebApp\Helpers\ViewFormsHelper;
class View {

    public $route;
    public $path;
    public $layout = 'default';
    public $viewForms;

    function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        $this->viewForms = new ViewFormsHelper();
    }

    function render($title, $vars = []) {
        extract($vars);
        $path = 'WebApp/Views/' . $this->path . '.php';
        
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'WebApp/Views/layouts/' . $this->layout . '.php';
        }
        else {
            echo 'View not found: '. $this->path;
        }
    }

    static function errorCode($code) {
        http_response_code($code);
        $path = 'WebApp/Views/errors/' . $code . '.php';

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