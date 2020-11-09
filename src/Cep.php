<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class Cep extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        if (empty($value)) {
            array_push($errors, "Cep não pode ser vazio!");
        }

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
        $ch = curl_init("http://viacep.com.br/ws/$value/json/");

        $response = curl_exec($ch);

        $result = json_decode($response);

        curl_close($ch);

        print_r($result);

        if (!is_null($result->erro)) {
            return false;
        }

        return true;
    }
}
