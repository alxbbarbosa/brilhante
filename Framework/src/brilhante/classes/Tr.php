<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Tr
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Tr
{

    public static function create($id = null)
    {
        $elemento = new Elemento('tr');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
