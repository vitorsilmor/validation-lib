<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class Uf extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        $allowedUF = array('AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MS', 'MT', 'MG', 'PA',
            'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO');

        if (empty($value)) {
            array_push($errors, "Uf não pode ser vazio!");
        }

        if (!in_array($value, $allowedUF)) {
            array_push($errors, "Uf não existente no Brasil");
        }

        return $this->result($errors);
    }
}
