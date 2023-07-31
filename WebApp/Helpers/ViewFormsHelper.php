<?php

namespace WebApp\Helpers;

class ViewFormsHelper {
    function selectOptions($optionsData, $type, $objectId = null) {
        foreach($optionsData as $el) {
            match($type) {
                'terminals' => $this->getOptionString($el->id ,$el->number, $objectId),
                'bodytypes' => $this->getOptionString($el->id ,$el->type.' / '.$el->diagonal, $objectId),
                'relations' => $this->getOptionString($el->id ,$el->name, $objectId),
                'counterparties' => $this->getOptionString($el->id ,$el->name.' / '.$el->counterparty_relation->name, $objectId),
                'modifications' => $this->getOptionString($el->id , $el->equipment_type->type.' / '.$el->modification, $objectId),
                'equipmentTypes' => $this->getOptionString($el->id ,$el->type, $objectId),
                'statuses' => $this->getOptionString($el->id ,$el->status, $objectId),
                'bodies' => $this->getOptionString($el->id ,$el->inventory_number.' / #'.$el->terminal->number, $objectId),
                'settlements' => $this->getOptionString($el->id ,$el->name.' / '.$el->region->name, $objectId),
            };
        }
    }

    private function getOptionString($optionId, $optionText, $objectId = null) {
        
        if($objectId and $objectId === $optionId) $is_selected = 'selected';
        else $is_selected = '';

        echo '<option value="'.$optionId.'" ' .$is_selected. ' >' .$optionText. '</option>';
    }

    
}

