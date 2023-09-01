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
        $response = $this->api->sendRequest('GET', 'warehouse/search', $_POST);
        //debug(json_decode($response));
        $responseAjax = array(
            "status" => "200",
            "data" => 123
        );
        header("Content-Type: application/json");
        echo json_encode($response);
    }
}