<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Description of Pagina
 *
 * @author abarbosa
 */
class Pagina
{
    private $title;
    private $header;
    private $body;
    private $aditionalHeaderContent;

    public function __construct($titulo)
    {
        $this->title  = new Elemento('title');
        $this->title->setValor($titulo);
        $this->header = new Elemento('header');
        $this->body   = new Elemento('body');
    }

    public function addBodyContent($content)
    {
        $this->body->setValor($content);
    }

    public function addHeaderContent($content)
    {
        $this->aditionalHeaderContent = $content;
    }

    public function get()
    {
        $html          = new Elemento('html');
        $html->adicionaAtributo('lang', 'pt-br');
        $charsetUtf8   = new Elemento('meta', FALSE);
        $charsetUtf8->adicionaAtributo('charset', 'utf-8');
        $arrayToHeader = array_merge([$charsetUtf8, $this->title], $this->aditionalHeaderContent);
        $this->header->setValor($arrayToHeader);
        $html->setValor([$this->header, $this->body]);
        return $html;
    }
}
