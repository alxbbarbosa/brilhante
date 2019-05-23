<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Campos;
use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe para criar o campo
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class campoTexto extends Campos
{

    /**
     * Construtor
     * @param string $rotulo
     * @param string $nome
     */
    public function __construct(string $rotulo, string $nome)
    {
        $this->rotulo = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
        $this->input  = new Elemento('input', FALSE);
        $this->input->adicionaAtributo('type', 'text');
        $this->input->adicionaAtributo('name', $nome);
        $this->input->adicionaAtributo('id', $nome);
    }

    /**
     * Obtém um array com os elementos configurados
     * @return array (Contendo objetos do tipo Elemento)
     */
    public function get()
    {
        return array($this->rotulo, $this->input);
    }
}
