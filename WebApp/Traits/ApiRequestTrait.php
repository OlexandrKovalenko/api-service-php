<?php

namespace WebApp\Traits;

use WebApp\Core\Controller;

trait ApiRequestTrait {

    function getSelectFormOptions(array $forms) {
        $data = [];
        foreach ($forms as $form) {
            if (!isset($data[$form])) $data[$form] = [];

            $data[$form] += match ($form) {
                'terminals' => json_decode($this->api->sendGetRequest('warehouse/terminal.search', ['list'=> true])),
                'counterparties' => json_decode($this->api->sendGetRequest('warehouse/counterparty.search', ['list'=> true])),
                'relations' => json_decode($this->api->sendGetRequest('warehouse/counterparty-relation', ['list'=> true])),
                'bodies' => json_decode($this->api->sendGetRequest('warehouse/body.search', ['list'=> true, 'with' => 'terminal'])),
                'bodytypes' => json_decode($this->api->sendGetRequest('warehouse/body-type', ['list'=> true])),
                'statuses' => json_decode($this->api->sendGetRequest('warehouse/equipment-status')),
                'equipmentTypes' => json_decode($this->api->sendGetRequest('warehouse/equipment-type')),
                'modifications' => json_decode($this->api->sendGetRequest('warehouse/equipment-modification')),
                'settlement' => json_decode($this->api->sendGetRequest('warehouse/settlement.search', ['list'=> true])),
            };
        }

        return $data;
    }
}