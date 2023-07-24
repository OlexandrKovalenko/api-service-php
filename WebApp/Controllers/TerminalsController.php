<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class TerminalsController extends Controller {

    function terminalsAction() {
        $response = $this->model->api->sendGetRequest('warehouse/terminal');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Термінали',['terminals' => $data]);
    }


}