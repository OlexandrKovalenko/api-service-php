<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class EquipmentController extends Controller {

    function indexAction() {

        $response = $this->model->api->sendGetRequest('warehouse/equipment');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Устаткування',['equipments' => $data]);
    }

    function showAction() {
        $response = $this->model->api->sendGetRequest('warehouse/equipment/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Устаткування: '.$data[0]->inventory_number,['equipment' => $data[0]]);
    }

    function editAction() {
        $response = $this->model->api->sendGetRequest('warehouse/equipment/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Устаткування: '.$data[0]->inventory_number,['equipment' => $data[0]]);
    }
}