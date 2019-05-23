<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use \InfoDinamics\Brilhante\Html\Gadgets\Pagina;
use \InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use \InfoDinamics\Brilhante\Html\Gadgets\CardBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\campoTextoBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\AreaTextoBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\SelectBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\CaixaListaBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\GrupoRadiosOptionsBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\GrupoCheckboxesBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\Formulario;
use \InfoDinamics\Brilhante\Html\Gadgets\BotaoBootstrap;
use \InfoDinamics\Brilhante\Html\Gadgets\Div;
use \InfoDinamics\Brilhante\Html\Gadgets\buildHTML;

$html = new InfoDinamics\Brilhante\Html\Gadgets\Pagina('Teste Bootstrap');

$linkcssA = new Elemento('link', FALSE);
$linkcssA->adicionaAtributo('href', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
$linkcssA->adicionaAtributo('rel', 'stylesheet');
$linkcssA->adicionaAtributo('integrity', 'sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB');
$linkcssA->adicionaAtributo('crossorigin', 'anonymous');

$linkcssB = new Elemento('link', FALSE);
$linkcssB->adicionaAtributo('href', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');
$linkcssB->adicionaAtributo('rel', 'stylesheet');
$linkcssB->adicionaAtributo('integrity', 'sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt');
$linkcssB->adicionaAtributo('crossorigin', 'anonymous');

$scriptA = new Elemento('script');
$scriptA->adicionaAtributo('src', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
$scriptA->adicionaAtributo('integrity', 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo');
$scriptA->adicionaAtributo('crossorigin', 'anonymous');

$scriptB = new Elemento('script');
$scriptB->adicionaAtributo('src', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
$scriptB->adicionaAtributo('integrity', 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49');
$scriptB->adicionaAtributo('crossorigin', 'anonymous');

$scriptC = new Elemento('script');
$scriptC->adicionaAtributo('src', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js');
$scriptC->adicionaAtributo('integrity', 'sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T');
$scriptC->adicionaAtributo('crossorigin', 'anonymous');

$html->addHeaderContent(array($linkcssA, $linkcssB, $scriptA, $scriptB, $scriptC));

$card   = new CardBootstrap('Card dinâmico');
$campos = array();
for ($i = 1; $i < 4; $i++) {
    $input = new campoTextoBootstrap("Teste {$i}:", "teste_{$i}");
    $input->tamanhoRotulo(2);
    $input->tamanhoInput(10);
    $card->adicionarConteudo($input->get());
}

$area = new AreaTextoBootstrap('Teste área:', 'teste_area');
$area->tamanhoRotulo(2);
$area->tamanhoInput(10);
$area->linhas(4);
$card->adicionarConteudo($area->get());

$select = new SelectBootstrap('Teste de select:', 'select_teste');
$select->tamanhoRotulo(2);
$select->tamanhoInput(10);
for ($a = 1; $a <= 10; $a++) {
    $select->adicionaItem($a, "Opção {$a}");
}
$card->adicionarConteudo($select->get());

$lista = new CaixaListaBootstrap('Teste de lista:', 'lista_teste');
$lista->tamanhoRotulo(2);
$lista->tamanhoInput(10);
for ($a = 1; $a <= 5; $a++) {
    $lista->adicionaItem($a, "Opção {$a}");
}
$card->adicionarConteudo($lista->get());

$options = new GrupoRadiosOptionsBootstrap('Grupo de options:', 'option_teste');
$options->tamanhoRotulo(2);
$options->tamanhoInput(10);
for ($a = 1; $a <= 4; $a++) {
    $options->adicionaOpcao($a, "Opção {$a}:");
}
$card->adicionarConteudo($options->get());

$check = new GrupoCheckboxesBootstrap('', 'check_teste');
$check->tamanhoRotulo(2);
$check->tamanhoInput(10);
for ($a = 1; $a <= 1; $a++) {
    $check->adicionaCheckbox($a, "Marcação {$a}:");
}
$check->setAttrInput('style', 'top:6px;');
$card->adicionarConteudo($check->get());

$form = new Formulario('post', '#');
$form->addFormContent($card->get());

$button1 = new BotaoBootstrap('enviar', 'Enviar', true);
$button1->classBtn('success');
$button1->setIconAwsome('check');

$button2 = new BotaoBootstrap('cancelar', 'Cancelar');
$button2->classBtn('danger');
$button2->setIconAwsome('times');

$card->addContentFooter(array($button1->get(), $button2->get()));

$div = Div::create();
$div->adicionaAtributo('class', 'container');
$div->adicionaAtributo('style', 'position: relative; top: 40px;');
$div->setValor($form->get());

$html->addBodyContent($div);

echo buildHTML::go($html->get());


