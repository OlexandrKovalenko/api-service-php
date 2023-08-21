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
        $data = json_decode($response);
        $this->view->render('Устаткування: '.$data->{0}->inventory_number,['equipment' => $data->{0}, 'history' => $data->history]);
    }

    function editAction() {
        if($_POST){
            try {
                $requestData = $this->dataHelper->formatRequest($_POST);
                $requestData += [
                    'id' => $this->route['id'],
                    'user' => $_SESSION['authenticated']['email'],
                ];
                $response = $this->api->sendRequest('PUT', 'warehouse/equipment', $requestData, $this->route['id']);
                $this->view->redirect('/equipment/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $response = $this->api->sendGetRequest('warehouse/equipment/'.$this->route['id']);
        $responseData = json_decode($response);
        $data['equipment'] = $responseData->{0};
        $data['history'] = $responseData->history;
        $data += $this->getSelectFormOptions(['counterparties', 'bodies', 'statuses', 'equipmentTypes', 'modifications']);

        $this->view->render('Редагування: '.$data['equipment']->inventory_number,['data' => $data, 'history' => $data['history']]);
    }

    function createAction() {
        if($_POST){

            try {
                $requestData = $this->dataHelper->formatRequest($_POST);
                $requestData += [
                    'user' => $_SESSION['authenticated']['email']
                ];
                $response = $this->api->sendRequest('POST', 'warehouse/equipment/store', $requestData);
                $this->view->redirect('/equipment/'.$response);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $selectFormOptions = $this->getSelectFormOptions(['counterparties', 'bodies', 'settlements', 'modifications', 'statuses']);
        $this->view->render('Додати обладнання', ['selectFormOptions' => $selectFormOptions]);
    }

    function testAction() {
        $data = [
            'id' => 1,
            'equipment_type_id' => 2,
            'email' => $_SESSION['authenticated']['email'],
            'orderBy' => ['body_id']
        ];
        $response = $this->api->sendRequest('GET', 'warehouse/equipment.search', $data);
        debug($response);

    }
}