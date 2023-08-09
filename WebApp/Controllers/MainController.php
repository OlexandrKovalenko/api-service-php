<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;


class MainController extends Controller {

    function indexAction() {
        $history = $this->api->sendGetRequest('warehouse/main');
        
        $this->view->render('Головна',['history' => json_decode($history)]);
    }
}