<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class Email extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        if (empty($value)) {
            array_push($errors, "Email não pode ser vazio!");
        }

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Formato de email inválido!");
        }

        return $this->result($errors);
    }
}
