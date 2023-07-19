<?php

namespace WebApp\Services;

class ValidateService {
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    function validate() {
        $this->errors = [];

        $this->validateField('email', 'Email', 'email');
        $this->validateField('password', 'Пароль', '/^.{8,}$/');

    }

    private function validateField($field, $fieldName, $regex) {
            if (!isset($this->data[$field]) && !empty($this->data[$field])) {
                $this->addError($field, "$fieldName не було передано.");
            } 
            /* elseif (is_string($regex) && !preg_match('~' . preg_quote($regex, '~') . '~', $this->data[$field])) {
                $this->addError($field, "$fieldName має неприпустимий формат.");
            } elseif (is_callable($regex) && !$regex($this->data[$field])) {
                $this->addError($field, "$fieldName неприпустимо.");
            } */
        }

    private function addError($field, $message) {
        $this->errors[$field] = $message;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function isValid() {
        return empty($this->errors);
    }
}