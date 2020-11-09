<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class Cpf extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        $value = $this->replaceUnnecessaryChars($value);

        if (!$this->validateSize($value)) {
            array_push($errors, "Cpf necessita ter ao menos 11 digitos!");
        }

        if ($this->validateRepeatedNumbers($value)) {
            array_push($errors, "Números repetidos não podem vir a ser um cpf válido!");
        }

        if (!$this->validateCpfCalculation($value)) {
            array_push($errors, "Cpf inválido!");
        }

        return $this->result($errors);
    }

    private function validateCpfCalculation($value)
    {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $value[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($value[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    private function validateRepeatedNumbers($value)
    {
        return preg_match('/(\d)\1{10}/', $value);
    }

    private function validateSize($value)
    {
        return strlen($value) == 11;
    }

    private function replaceUnnecessaryChars($value)
    {
        return preg_replace('/[^0-9]/is', '', $value);
    }
}
