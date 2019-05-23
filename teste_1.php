<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/vendor/autoload.php';

use \InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use \InfoDinamics\Brilhante\Html\Gadgets\buildHTML;
use \InfoDinamics\Brilhante\Html\Gadgets\Campos;
use \InfoDinamics\Brilhante\Html\Gadgets\campoTexto;
use \InfoDinamics\Brilhante\Html\Gadgets\Div;
use \InfoDinamics\Brilhante\Html\Gadgets\Span;
use \InfoDinamics\Brilhante\Html\Gadgets\CardBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\campoTextoBootstrap;

$html        = new Elemento('html');
$header      = new Elemento('header');
$title       = new Elemento('title');
$charsetUtf8 = new Elemento('meta', FALSE);
$body        = new Elemento('body');
$charsetUtf8->adicionaAtributo('charset', 'utf-8');
$title->setValor('Teste');
$header->setValor(array($title, $charsetUtf8));


$card   = new CardBootstrap('Teste');
$campos = array();
for ($i = 1; $i < 5; $i++) {
    $input    = new campoTextoBootstrap("Teste {$i}", "teste_{$i}");
    $campos[] = $input->get();
}
$card->addContentBody($campos);


$input = new campoTexto('Nome:', 'nome');
$input->setAttrInput('class', 'form-control col-sm-8');
$input->setAttrRotulo('class', 'col-sm-2 col-form-label text-right');

$div2 = Div::create();
$div2->adicionaAtributo('class', 'form-group');
$span = Span::create();

$span->adicionaAtributo('class', 'alert alter-danger off-set-2');
$div2->setValor([$input->get(), $span]);

$div1 = Div::create();
$div1->adicionaAtributo('class', 'card');
$div1->setValor($div2);

$body->setValor($div1);

$body->setValor($card->get());

$html->setValor(array($header, $body));

$all = buildHTML::go($html);
echo $all;

