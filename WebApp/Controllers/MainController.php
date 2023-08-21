<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;


class MainController extends Controller {

    function indexAction() {
        $history = $this->api->sendGetRequest('warehouse/main');
        $invData = json_decode(require 'WebApp/res/inv.php');
        $this->view->render('Головна',['history' => json_decode($history), 'dataVerification' => $invData->list]);
    }

    function mainSearchAction() {
        debug($_POST['input_data']);
    }
}