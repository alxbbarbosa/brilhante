<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Span
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Span
{

    public static function create($id = null)
    {
        $elemento = new Elemento('span');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
