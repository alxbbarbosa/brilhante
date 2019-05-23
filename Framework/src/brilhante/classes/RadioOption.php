<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Campos;

/**
 * RadioOption - Cria um elemento de opções
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class RadioOption extends Campos
{
    public function __construct($rotulo, $nome)
    {
        $this->rotulo = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
        $this->input  = new Elemento('input', FALSE);
        $this->input->adicionaAtributo('type', 'radio');
        $this->input->adicionaAtributo('name', $nome);
        $this->input->adicionaAtributo('id', $nome);
    }

    public function get()
    {
        return array($this->rotulo, $this->input);
    }
}
