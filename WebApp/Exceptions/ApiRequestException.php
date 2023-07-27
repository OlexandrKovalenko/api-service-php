<?php
namespace WebApp\Exceptions;

use Exception;

class ApiRequestException extends Exception
{
    // Конструктор для удобного создания объекта исключения
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}