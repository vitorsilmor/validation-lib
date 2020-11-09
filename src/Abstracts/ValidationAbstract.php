<?php

namespace Sanar\Abstracts;

abstract class ValidationAbstract
{
    /**
     * Transforma errors em resposta
     *
     * @param $errors
     */
    public function result($errors)
    {
        if (count($errors) > 0) {
            return [
                "error" => true,
                "messages" => $errors,
            ];
        }

        return [
            "error" => false,
        ];
    }
}
