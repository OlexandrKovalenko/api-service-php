<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;

class CounterpartyController extends Controller {

    function indexAction() {
        $response = $this->api->sendGetRequest('warehouse/counterparty');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Контрагенти',['counterparties' => $data]);
    }

    function showAction() {
        $response = $this->api->sendGetRequest('warehouse/counterparty/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Контрагент: '.$data[0]->name,['counterparty' => $data[0]]);
    }

    function editAction() {
        if($_POST){
            try {
                $response = $this->api->sendRequest('PUT', 'warehouse/counterparty', $_POST, $this->route['id']);
                $this->view->redirect('/counterparty/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }

        $response = $this->api->sendGetRequest('warehouse/counterparty/'.$this->route['id']);
        $data['counterparty'] = $this->dataHelper->normalizeData(json_decode($response))[0];

        $response = $this->api->sendGetRequest('warehouse/counterparty-relation');
        $data['relations'] = json_decode($response);

        $this->view->render('Редагування: '.$data['counterparty']->name,['data' => $data]);
    }

    function createAction() {
        if($_POST){
            try {
                $response = $this->api->sendRequest('POST', 'warehouse/counterparty/create', $_POST);
                $this->view->redirect('/counterparty/'.$response);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $selectFormOptions = $this->getSelectFormOptions(['relations']);

        $this->view->render('Додати новий корпус', ['selectFormOptions' => $selectFormOptions]);
    }
}