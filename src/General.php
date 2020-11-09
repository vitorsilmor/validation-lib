<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class General extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        if (is_array($value)) {
            if (count($value) == 0) {
                array_push($errors, "Lista não pode ser vazia!");
            }
        }

        if (empty($value)) {
            array_push($errors, "Atributo não pode ser vazio!");
        }

        return $this->result($errors);
    }
}
