<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;
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

    function editAction() {
        if($_POST){
            try {
                $this->model->api->sendRequest('PUT', 'warehouse/body', $_POST, $this->route['id']);
                $this->view->redirect('/case/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }

        $response = $this->model->api->sendGetRequest('warehouse/body/'.$this->route['id']);
        $data['body'] = json_decode($response)[0];
        $response = $this->model->api->sendGetRequest('warehouse/terminal.search', ['list'=> true]);
        $data['terminals'] = json_decode($response);
        $response = $this->model->api->sendGetRequest('warehouse/body-type');
        $data['bodytype'] = json_decode($response);
        $this->view->render('Редагування: '.$data['body']->inventory_number, ['data' => $data]);
    }

    function createAction() {
        return $this->todo();
    }
}