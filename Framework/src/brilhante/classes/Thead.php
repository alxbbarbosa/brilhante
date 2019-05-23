<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Thead
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Thead
{

    public static function create($id = null)
    {
        $elemento = new Elemento('thead');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
