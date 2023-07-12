<?php
namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller {

    function indexAction() {
        $this->view->render('Головна');
    }
}