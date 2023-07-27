<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;

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
        if($_POST){
            try {
                $this->model->api->sendRequest('PUT', 'warehouse/equipment', $_POST, $this->route['id']);
                $this->view->redirect('/equipment/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $response = $this->model->api->sendGetRequest('warehouse/equipment/'.$this->route['id']);
        $data['equipment'] = json_decode($response)[0];

        $response = $this->model->api->sendGetRequest('warehouse/counterparty.search', ['list'=> true]);
        $data['counterparties'] = json_decode($response);

        $response = $this->model->api->sendGetRequest('warehouse/body.search', ['list'=> true, 'with' => 'terminal']);
        $data['bodies'] = json_decode($response);

        $response = $this->model->api->sendGetRequest('warehouse/equipment-status');
        $data['statuses'] = json_decode($response);

        $response = $this->model->api->sendGetRequest('warehouse/equipment-type');
        $data['equipmentTypes'] = json_decode($response);

        $response = $this->model->api->sendGetRequest('warehouse/equipment-modification');
        $data['modifications'] = json_decode($response);
        $this->view->render('Редагування: '.$data['equipment']->inventory_number,['data' => $data]);
    }

    function createAction() {
        return $this->todo();
    }
}