<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class SimcardController extends Controller {

    function indexAction() {

        $response = $this->model->api->sendGetRequest('warehouse/sim');

        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Контрагенти',['simcards' => $data]);
    }

    function createAction() {
        return $this->todo();
    }
}