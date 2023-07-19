<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;


class MainController extends Controller {

    function indexAction() {
        $this->view->render('Головна');
    }
}