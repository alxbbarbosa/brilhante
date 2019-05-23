<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Div;
use InfoDinamics\Brilhante\Html\Gadgets\Span;

/**
 * CardBootstrap: Classe que constrói um card Bootstrap
 *
 * @author abarbosa
 */
class CardBootstrap
{
    protected $card;
    protected $card_header;
    protected $card_body;
    protected $card_footer;

    public function __construct(string $titulo)
    {
        $this->card        = Div::create();
        $this->card->adicionaAtributo('class', 'card');
        $this->card_header = Div::create();
        $this->card_header->adicionaAtributo('class', 'card-header');
        $span              = Span::create();
        $span->adicionaAtributo('class', 'card-title');
        $span->setValor($titulo);
        $this->card_header->setValor($span);
        $this->card_body   = Div::create();
        $this->card_body->adicionaAtributo('class', 'card-body');
        $this->card_footer = Div::create();
        $this->card_footer->adicionaAtributo('class', 'card-footer');
    }

    /**
     * Adicionar conteúdo no corpo
     * @param type $content
     */
    public function addContentBody($content)
    {
        $this->card_body->setValor($content);
    }

    /**
     * Adicionar conteúdos no Rodapé
     * @param type $content
     */
    public function addContentFooter($content)
    {
        $this->card_footer->setValor($content);
    }

    /**
     * Este método de entrada de elementos destroi entradas anteriores e começa a receber como array
     *
     * @param array/Elemento $elemento
     */
    public function adicionarConteudo($elemento)
    {
        $this->card_body->adicionarConteudo($elemento);
    }

    /**
     * Retornar o card
     * @return type
     */
    public function get()
    {
        $this->card->setValor([$this->card_header, $this->card_body, $this->card_footer]);
        return $this->card;
    }
}
