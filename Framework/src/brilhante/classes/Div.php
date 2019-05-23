<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe para criar Div
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Div
{
    public static function create($id = null)
    {
        $elemento = new Elemento('div');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
