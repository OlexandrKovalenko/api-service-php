<?php
namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller {

    function before() {
        // change layout
        $this->view->layout = 'default';
    }

    function loginAction() {
        $this->view->render('Увійти');
    }
}