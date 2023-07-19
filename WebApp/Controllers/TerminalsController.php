<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class TerminalsController extends Controller {

    function terminalsAction() {
        $this->view->redirect('/login');
        $this->view->render('Термінали');
    }
}