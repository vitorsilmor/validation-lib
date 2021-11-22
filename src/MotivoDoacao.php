<?php

namespace Sanar;

use Sanar\Abstracts\ValidationAbstract;
use Sanar\Interfaces\ValidationInterface;

class MotivoDoacao extends ValidationAbstract implements ValidationInterface
{
    public function validate($value)
    {
        $errors = [];

        $motivos = array(
            'DEFENSORES',
            'PROMOCAO',
            'AUTORES',
            'EVENTOS',
            'SUCESSO',
            'ENVIO_VENDA',
            'REENVIO',
            'MARKETING'
        );

        if (empty($value)) {
            array_push($errors, "Motivo da doação não pode ser vazio!");
        }

        if (!in_array($value, $motivos)) {
            array_push($errors, "Motivo da doação não existente em nossa base de dados!");
        }

        return $this->result($errors);
    }
}
