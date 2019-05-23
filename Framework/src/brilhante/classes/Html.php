<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\buildHTML;

/**
 * Description of Html
 *
 * @author abarbosa
 */
class Html
{

    /**
     * Criar estrutura básica de página
     * @param Elemento $title
     * @return Elemento
     */
    public static function make($title = 'Default page')
    {
        $html        = new Elemento('html');
        $header      = new Elemento('header');
        $title       = new Elemento('title');
        $charsetUtf8 = new Elemento('meta', FALSE);
        $body        = new Elemento('body');
        $charsetUtf8->adicionaAtributo('charset', 'utf-8');
        $title->setValor($title);
        $header->setValor(array($title, $charsetUtf8));
        $html->setValor(array($header, $body));
        return $html;
    }

    public static function title(string $title)
    {
        $title->setValor($title);
    }
}
