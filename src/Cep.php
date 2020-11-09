<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class Cep extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        if (!is_numeric($value)) {
            array_push($errors, "Cep precisar ser número!");
        }

        if (!$this->validateSize($value)) {
            array_push($errors, "Cep precisa ter 8 digitos!");
        }

        if (!$this->validateIfExists($value)) {
            array_push($errors, "Cep não encontrado na base de dados");
        }

        return $this->result($errors);

    }

    private function validateSize($value)
    {
        return strlen($value) == 8;
    }

    private function validateIfExists($value)
    {
        $x = file_get_contents("http://viacep.com.br/ws/$value/json/");

        if (!is_null(json_decode($x)->erro)) {
            return false;
        }

        return true;
    }
}
