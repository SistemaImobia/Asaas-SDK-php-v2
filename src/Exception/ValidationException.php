<?php

namespace Imobia\Asaas\Exception;

class ValidationException extends HttpException
{
    public $errors;

    public function __construct($error_message, $reponse_code, $errors)
    {
        parent::__construct($error_message, $reponse_code);

        $this->errors = array_map(function ($error) {
            return $error->description;
        }, $errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
