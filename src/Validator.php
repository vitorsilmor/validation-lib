<?php

namespace Sanar;

class Validator
{
    public static function validateCpf($value)
    {
        $validator = new Cpf();
        return $validator->validate($value);
    }

    public static function validateGeneral($value)
    {
        $validator = new General();
        return $validator->validate($value);
    }

    public static function validateCep($value)
    {
        $validator = new Cep();
        return $validator->validate($value);
    }

    public static function validateUf($value)
    {
        $validator = new Uf();
        return $validator->validate($value);
    }

    public static function validateEmail($value)
    {
        $validator = new Email();
        return $validator->validate($value);
    }

    public static function validateMotivoDoacao($value)
    {
        $validator = new MotivoDoacao();
        return $validator->validate($value);
    }
}
