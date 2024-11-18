<?php

namespace Imobia\Asaas\Exception;

class ForbiddenException extends HttpException
{
    public $errors;

    public function __construct($error_message, $reponse_code, $errors)
    {
        parent::__construct('Você não tem permissão para realizar esta operação.', $reponse_code);

        $this->errors = array_map(function ($error) {
            return $error->description;
        }, $errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
