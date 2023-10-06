<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;

class SimcardController extends Controller {

    function indexAction() {

        $response = $this->api->sendGetRequest('warehouse/sim');

        $simdata = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Sim-карти',['simcards' => $simdata]);
    }

    function showAction() {
        $response = $this->api->sendGetRequest('warehouse/sim/'.$this->route['id']);
        $simdata = json_decode($response);
        $this->view->render('Sim- Карта: '.$simdata[0]->inventory_number, ['simcard' => $simdata[0]]);
    }

    function editAction() {
        /*         
        'inventory_number' => 'required|min:4',
        'number' => 'required|numeric',
        'icc' => 'required|numeric',
        'equipment_status_id' => 'required|numeric',
        'body_id' => 'required|numeric',
        'description' => 'nullable|string', 
        */


        if($_POST){
            try {
                $requestData = $this->dataHelper->formatRequest($_POST);
                $requestData += [
                    'id' => $this->route['id'],
                    'user' => $_SESSION['authenticated']['email'],
                ];
                $response = $this->api->sendRequest('PUT', 'warehouse/sim', $requestData, $this->route['id']);
                $this->view->redirect('/sim-card/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $response = $this->api->sendGetRequest('warehouse/sim/'.$this->route['id']);
        $simdata = json_decode($response);
        $selectFormOptions = $this->getSelectFormOptions(['bodies', 'statuses']);

        $this->view->render('Редагування: '.$simdata[0]->inventory_number,['simdata' => $simdata[0], 'selectFormOptions' => $selectFormOptions]);
    }

    function createAction() {
        if($_POST){
            try {
                $response = $this->api->sendRequest('POST', 'warehouse/sim/create', $_POST);
                $this->view->redirect('/sim-card/'.$response);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $selectFormOptions = $this->getSelectFormOptions(['bodies', 'statuses']);

        $this->view->render('Додати нову Sim', ['selectFormOptions' => $selectFormOptions]);
    }
}