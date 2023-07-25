<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class CounterpartyController extends Controller {

    function indexAction() {
        $response = $this->model->api->sendGetRequest('warehouse/counterparty');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Контрагенти',['counterparties' => $data]);
    }

    function showAction() {
        $response = $this->model->api->sendGetRequest('warehouse/counterparty/'.$this->route['id']);
        $data = $this->dataHelper->normalizeData(json_decode($response));
        $this->view->render('Контрагент: '.$data[0]->name,['counterparty' => $data[0]]);
    }
}