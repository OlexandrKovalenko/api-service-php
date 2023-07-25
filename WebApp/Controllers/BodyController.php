<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class BodyController extends Controller {

    function indexAction() {
        $response = $this->model->api->sendGetRequest('warehouse/body');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Корпуси',['bodies' => $data]);
    }

    function showAction() {
        $response = $this->model->api->sendGetRequest('warehouse/body/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Корпус: '.$data[0]->inventory_number,['body' => $data[0]]);
    }
}