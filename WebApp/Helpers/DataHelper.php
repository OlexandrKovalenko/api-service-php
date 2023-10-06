<?php

namespace WebApp\Helpers;

use Carbon\Carbon;

class DataHelper {
    function normalizeData($data) {
        foreach($data as $el) {
            if(empty($el->body)) {
                $el->body = [(object)[]];
                $el->body[0]->inventory_number = 'Невідомо';
                $el->body[0]->id = 1;
                $el->body[0]->bodytype = (object)[];
                $el->body[0]->bodytype->id = 'Невідомо';
                $el->body[0]->bodytype->type = 'Невідомо';
                $el->body[0]->bodytype->diagonal = 'Невідомо';
            }
        }

        return $data;
    }

    function formatRequest ($postData) {
        $data = [];

        $paramHandlers = [
            //terminal
            'number' => fn($value) => ['number' => $value],
            'is_active' => fn($value) => ['is_active' => $value],
            'is_outdoor' => fn($value) => ['is_outdoor' => $value],
            'address' => fn($value) => ['address' => $value],

            //counterparty
            'counterparty_id' => fn($value) => ['counterparty_id' => $value],
            'name' => fn($value) => ['name' => $value],
            'full_name' => fn($value) => ['full_name' => $value],
            'counterparty_relation_id' => fn($value) => ['counterparty_relation_id' => $value],

            //settlement
            'settlement_id' => fn($value) => ['settlement_id' => $value],
            'region_id' => fn($value) => ['region_id' => $value],

            //body
            'body_type_id' => fn($value) => ['body_type_id' => $value],
            'terminal_id' => fn($value) => ['terminal_id' => $value],
            'inventory_number' => fn($value) => ['inventory_number' => $value],

            //equipment
            'equipment_type_id' => fn($value) => ['equipment_type_id' => $value],
            'equipment_modification_id' => fn($value) => ['equipment_modification_id' => $value],
            'equipment_status_id' => fn($value) => ['equipment_status_id' => $value],
            'body_id' => fn($value) => ['body_id' => $value],

            //sim
            'icc' => fn($value) => ['icc' => $value],

            'id' => fn($value) => ['id' => $value],
            'phone' => fn($value) => ['phone' => $value],
            'description' => fn($value) => ['description' => $value],
            'descriptionHistory' => fn($value) => ['descriptionHistory' => $value],
            'modification' => fn($value) => ['modification' => $value],
            'createdFrom' => fn($value) =>  ['createdFrom' => $value ?? Carbon::now()->lastOfYear()],
            'createdTo' => fn($value) => ['createdTo' => $value] ?? Carbon::now(),
            'updatedFrom' => fn($value) =>  ['updatedFrom' => $value] ?? Carbon::now()->lastOfYear(),
            'updatedTo' => fn($value) => ['updatedTo' => $value] ?? Carbon::now(),
            'orderBy' => fn($value) => ['orderBy' => $value ?? ['id','asc']],
        ];

        foreach ($postData as $param => $value) {
            if (isset($paramHandlers[$param])) {
                $data = array_merge_recursive($data, $paramHandlers[$param]($value));
            }
        }

        return $data;

    }
}