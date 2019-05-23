<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Botao;

/**
 * Classe Botão Bootstrap
 *
 * @author Alexandre Bezerra BArbosa
 */
class BotaoBootstrap extends Botao
{
    protected $rotulo;

    public function __construct(string $nome = null, $rotulo = null, $submit = false)
    {
        $this->rotulo = $rotulo;
        parent::__construct($nome, $rotulo, $submit);
    }

    public function classBtn($nome)
    {
        $this->setAttr('class', "btn btn-{$nome}");
    }

    public function setIconAwsome($icon)
    {
        $this->botao->setValor("<i class=\"fa fa-{$icon}\"></i> {$this->rotulo}");
    }

    public function get()
    {
        return $this->botao;
    }
}
