<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;

class EquipmentsController extends Controller {

    function equipmentsAction() {

        $response = $this->model->api->sendGetRequest('warehouse/equipment');
        $data = $this->dataHelper->normalizeData(json_decode($response));

        $this->view->render('Устаткування',['equipments' => $data]);
    }


}