<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;


class MainController extends Controller {

    function indexAction() {
        $mainPagedata = $this->api->sendGetRequest('warehouse/main');
        $mainPagedata = json_decode($mainPagedata);
        $invData = json_decode(require 'WebApp/res/inv.php');
        $this->view->render('Головна',['dashboard' => $mainPagedata->dashboard, 'history' => $mainPagedata->lastTwentyRecords, 'dataVerification' => $invData->list]);
    }

    function mainSearchAction() {
        $response = $this->api->sendRequest('GET', 'warehouse/search', $_POST);
        header("Content-Type: application/json");
        echo json_encode($response);
    }
}