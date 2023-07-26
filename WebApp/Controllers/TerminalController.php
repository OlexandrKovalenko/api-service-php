<?php
namespace WebApp\Controllers;

use GuzzleHttp\Psr7\Request;
use WebApp\Core\Controller;

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
        $response = $this->model->api->sendGetRequest('warehouse/terminal/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Термінал: '.$data[0]->number,['terminal' => $data[0]]);
    }

}