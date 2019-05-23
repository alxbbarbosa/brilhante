<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Table
 * 
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Table
{

    public static function create($id = null)
    {
        $elemento = new Elemento('table');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
