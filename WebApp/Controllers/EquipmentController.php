<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;

class EquipmentController extends Controller {

    function indexAction() {

        $response = $this->api->sendGetRequest('warehouse/equipment');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Устаткування',['equipments' => $data]);
    }

    function showAction() {
        $response = $this->api->sendGetRequest('warehouse/equipment/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Устаткування: '.$data[0]->inventory_number,['equipment' => $data[0]]);
    }

    function editAction() {
        if($_POST){
            try {
                $this->api->sendRequest('PUT', 'warehouse/equipment', $_POST, $this->route['id']);
                $this->view->redirect('/equipment/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $response = $this->api->sendGetRequest('warehouse/equipment/'.$this->route['id']);
        $data['equipment'] = json_decode($response)[0];

        $data += $this->getSelectFormOptions(['counterparties', 'bodies', 'statuses', 'equipmentTypes', 'modifications']);

        $this->view->render('Редагування: '.$data['equipment']->inventory_number,['data' => $data]);
    }

    function createAction() {
        return $this->todo();
    }
}