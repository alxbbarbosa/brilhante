<?php
namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Td
 *
 * @author Alexandre Bezerra Barbosa
 */
class Td
{

    public static function create($id = null)
    {
        $elemento = new Elemento('td');
        if (!is_null($id)) {
            $elemento->adicionaAtributo('id', $id);
        }
        return $elemento;
    }
}
