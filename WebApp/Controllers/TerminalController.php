<?php
namespace WebApp\Controllers;

use GuzzleHttp\Psr7\Request;
use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;

class TerminalController extends Controller {

    function indexAction() {
        $response = $this->api->sendGetRequest('warehouse/terminal');
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Термінали',['terminals' => $data]);
    }

    function showAction() {
        $response = $this->api->sendGetRequest('warehouse/terminal/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Термінал: '.$data[0]->number,['terminal' => $data[0]]);
    }

    function editAction() {
        if($_POST){
            try {
                $this->api->sendRequest('PUT', 'warehouse/terminal', $_POST, $this->route['id']);
                $this->view->redirect('/terminal/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }

        $response = $this->api->sendGetRequest('warehouse/terminal/'.$this->route['id']);
        $data['terminal'] = $this->dataHelper->normalizeData(json_decode($response))[0];

        $data += $this->getSelectFormOptions(['counterparties', 'bodies', 'settlement']);

        $this->view->render('Редагування: '.$data['terminal']->number,['data' => $data]);
    }

    function activateAction() {
        if($_POST){
            try {
                $this->api->sendRequest('PUT', 'warehouse/terminal', $_POST, $this->route['id']);
                $this->view->redirect('/terminal/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
    }

    function createAction() {
        if($_POST){
            try {
                $response = $this->api->sendRequest('POST', 'warehouse/terminal/create', $_POST);
                $this->view->redirect('/terminal/'.$response);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
        $selectFormOptions = $this->getSelectFormOptions(['counterparties', 'bodies', 'settlements']);

        $this->view->render('Додати новий термінал', ['selectFormOptions' => $selectFormOptions]);
    }
}