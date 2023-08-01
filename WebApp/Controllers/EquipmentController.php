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
                $_POST += [
                    'id' => $this->route['id'],
                    'user' => $_SESSION['authenticated']['id']
                ];
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
        if($_POST){

            try {
                $_POST += [
                    'user' => $_SESSION['authenticated']['id']
                ];
                $response = $this->api->sendRequest('POST', 'warehouse/equipment/store', $_POST);
                $this->view->redirect('/equipment/'.$response);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $selectFormOptions = $this->getSelectFormOptions(['counterparties', 'bodies', 'settlements', 'modifications', 'statuses']);
        $this->view->render('Додати обладнання', ['selectFormOptions' => $selectFormOptions]);
    }
}