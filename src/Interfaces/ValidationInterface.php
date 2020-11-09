<?php

namespace Sanar\Interfaces;

interface ValidationInterface
{
    /**
     * Valida um atributo
     *
     * @param $value
     */
    public function validate($value);
}
