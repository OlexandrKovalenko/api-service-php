<?php
namespace App\Core;

use App\Core\View;

class Controller {

    public $route;
    public $view;

    function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);

        if (method_exists($this, 'before')) {
            
        }

        // todo: check auth!
    }
}