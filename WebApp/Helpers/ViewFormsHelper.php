<?php

namespace WebApp\Helpers;

class ViewFormsHelper {
    function selectOptions($optionsData, $type, $objectId = null) {
        foreach($optionsData as $el) {
            match($type) {
                'terminals' => $this->getOptionString($el->id ,$el->number, $objectId),
                'bodytypes' => $this->getOptionString($el->id ,$el->type.' / '.$el->diagonal, $objectId),
                'relations' => $this->getOptionString($el->id ,$el->name, $objectId),
            };
        }
    }

    private function getOptionString($optionId, $optionText, $objectId = null) {
        
        if($objectId and $objectId === $optionId) $is_selected = 'selected';
        else $is_selected = '';

        echo '<option value="'.$optionId.'" ' .$is_selected. ' >' .$optionText. '</option>';
    }
}

