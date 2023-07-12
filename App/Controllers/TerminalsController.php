<?php
namespace App\Controllers;

use App\Core\Controller;

class TerminalsController extends Controller {

    function terminalsAction() {
        $this->view->redirect('/login');
        $this->view->render('Термінали');
    }
}