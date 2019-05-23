<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Paragrafo Html
 *
 * @author Alexandre Bezerra Barbosa
 */
class Paragrafo extends Tag
{

    /**
     * Construtor
     * @param string $rotulo
     * @param string $nome
     */
    public function __construct(string $rotulo, string $nome)
    {
        $this->elemento = new Elemento('p');
    }

    /**
     * Obtém um elemento configurado
     * @return Elemento
     */
    public function get()
    {
        return $this->elemento;
    }
}
