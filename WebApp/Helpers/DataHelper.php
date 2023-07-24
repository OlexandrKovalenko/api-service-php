<?php

namespace WebApp\Helpers;

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
}