<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Tbody
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Tbody
{

    public static function create($id = null)
    {
        $elemento = new Elemento('tbody');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
