<?php
namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Th
 *
 * @author Alexandre Bezerra Barbosa
 */
class Th
{

    public static function create($id = null)
    {
        $elemento = new Elemento('th');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
