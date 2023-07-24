<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class BodiesController extends Controller {

    function bodiesAction() {

        $response = $this->model->api->sendGetRequest('warehouse/body');
        debug($response);
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Корпуси',['bodies' => $data]);
    }


}