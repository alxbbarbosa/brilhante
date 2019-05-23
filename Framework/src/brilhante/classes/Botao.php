<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe botao
 *
 * @author Alexandre Bezerra BArbosa
 */
class Botao
{
    protected $botao;

    public function __construct(string $nome = null, $rotulo = null, $submit = false)
    {
        $this->botao = new Elemento('button');
        if ($submit == true) {
            $this->botao->adicionaAtributo('type', 'submit');
        }
        $this->botao->adicionaAtributo('name', $nome);
        $this->botao->adicionaAtributo('id', $nome);

        $this->botao->setValor($rotulo);
    }

    public function setAttr($nome, $valor = null)
    {
        $this->botao->adicionaAtributo($nome, $valor);
    }

    public function get()
    {
        return $this->botao;
    }
}
