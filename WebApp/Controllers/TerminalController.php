<?php
namespace WebApp\Controllers;

use GuzzleHttp\Psr7\Request;
use WebApp\Core\Controller;
use WebApp\Exceptions\ApiRequestException;

class TerminalController extends Controller {

    function indexAction() {
        $response = $this->model->api->sendGetRequest('warehouse/terminal');
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Термінали',['terminals' => $data]);
    }

    function showAction() {
        $response = $this->model->api->sendGetRequest('warehouse/terminal/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Термінал: '.$data[0]->number,['terminal' => $data[0]]);
    }

    function editAction() {
        if($_POST){
            try {
                $this->model->api->sendRequest('PUT', 'warehouse/terminal', $_POST, $this->route['id']);
                $this->view->redirect('/terminal/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }

        $response = $this->model->api->sendGetRequest('warehouse/terminal/'.$this->route['id']);
        $data['terminal'] = $this->dataHelper->normalizeData(json_decode($response))[0];

        $response = $this->model->api->sendGetRequest('warehouse/body.search', ['list'=> true]);
        $data['bodies'] = json_decode($response);

        $response = $this->model->api->sendGetRequest('warehouse/settlement.search', ['list'=> true]);
        $data['settlement'] = json_decode($response);

        $response = $this->model->api->sendGetRequest('warehouse/counterparty.search', ['list'=> true]);
        $data['counterparties'] = json_decode($response);
        $this->view->render('Редагування: '.$data['terminal']->number,['data' => $data]);
    }

    function activateAction() {
        if($_POST){
            try {
                $this->model->api->sendRequest('PUT', 'warehouse/terminal', $_POST, $this->route['id']);
                $this->view->redirect('/terminal/'.$this->route['id']);
            } catch (ApiRequestException $e) {
                echo 'Помилка запиту: ' . $e->getMessage();
            }
        }
    }

    function createAction() {
        return $this->todo();
    }
}