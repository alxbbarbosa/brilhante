<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Campos;

/**
 * Class CheckBox
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Checkbox extends Campos
{
    /**
     * Construtor
     * @param type $rotulo
     * @param type $nome
     */
    public function __construct($rotulo, $nome)
    {
        $this->rotulo = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
        $this->input  = new Elemento('input', FALSE);
        $this->input->adicionaAtributo('type', 'checkbox');
        $this->input->adicionaAtributo('name', $nome);
        $this->input->adicionaAtributo('id', $nome);
    }

    public function get()
    {
        return array($this->rotulo, $this->input);
    }
}
