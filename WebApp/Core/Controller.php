<?php
namespace WebApp\Core;

use WebApp\Core\View;
use WebApp\Services\ApiServices;
use WebApp\Helpers\DataHelper;

class Controller {

    public $route;
    public $view;
    public $model;
    public $acl;
    public $token;
    public $dataHelper;

    function __construct($route) {
        $this->route = $route;
        if(!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        $this->dataHelper = new DataHelper();
        if (method_exists($this, 'before')) {
            
        }
    }

    public function loadModel($name) {
        $path = 'WebApp\\Models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    function checkAcl() {
        
        $this->acl = file_exists('WebApp/acl/' .$this->route['controller']. '.php') ? 
            require 'WebApp/acl/' .$this->route['controller']. '.php':
            require 'WebApp/acl/' .ucfirst($this->route['controller']). '.php';

        if(isset($_SESSION['authenticated']['id']) and $this->isAcl('authorise')) {
            return true;
        }
        elseif(!isset($_SESSION['authenticated']['id']) and $this->isAcl('guest')) {
            return true;
        }
        elseif(isset($_SESSION['authenticated']['supervisor']) and $this->isAcl('supervisor')) {
            return true;
        }
        elseif(isset($_SESSION['authenticated']['admin']) and $this->isAcl('admin')) {
            return true;
        }
        return false;
    }

    private function isAcl($key) {
        return in_array($this->route['action'], $this->acl[$key]);
    }

    function todo() {
        echo 'to be continued...';
    }
}