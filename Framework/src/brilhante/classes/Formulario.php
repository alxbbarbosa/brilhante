<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Botao;

/**
 * Classe formulário
 *
 * @author Alexandre Bezerra Barbosa
 */
class Formulario
{
    protected $metodo;
    protected $action;
    protected $arquivos;
    protected $botoes;
    protected $form;
    protected $content;

    public function __construct(string $metodo, string $action, bool $botoes = false, bool $arquivos = false)
    {
        $this->botoes = $botoes;
        $this->form   = new Elemento('form');

        $this->form->adicionaAtributo('method', $metodo);
        $this->form->adicionaAtributo('action', $action);

        if ($arquivos == true) {
            $this->form->adicionaAtributo('enctype', 'multipart/form-data');
        }
    }

    public function setAttrInput($nome, $valor = null)
    {
        $this->form->adicionaAtributo($nome, $valor);
    }

    public function addFormContent($content)
    {
        $this->content = $content;
    }

    public function get()
    {

        if ($this->botoes == true) {
            $btn1 = new Botao('submit', 'Enviar');
            $btn1->setAttr('type', 'submit');
            $btn2 = new Botao('clear', 'Limpar');
            $btn2->setAttr('type', 'reset');
            $this->form->setValor(array_merge($this->content, [$btn1->get(), $btn2->get()]));
        } else {
            $this->form->setValor($this->content);
        }

        return $this->form;
    }
}
