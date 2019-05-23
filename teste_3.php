<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use \InfoDinamics\Fascinio\Html\Gadgets\Tabela;

$tabela = new Tabela(['nome' => 'Mauro', 'idade' => '39', 'profissao' => 'Programador C#']);
$tabela->adicionarLinha(['nome' => 'Olivia', 'idade' => '28', 'profissao' => 'Costureira']);
$tabela->adicionarLinha(['nome' => 'João', 'idade' => '40', 'profissao' => 'Pedrerão']);


foreach ($tabela->todos() as $linha) {
    echo $linha->id.' - '.$linha->nome.'<br />';
}

echo "<br />Se chegou até aqui sem erro ... hum";

$tabela = new Tabela;
$tabela->definirColunas(['nome', 'idade', 'profissao']);
$tabela->adicionarLinha(['nome' => 'Luis', 'idade' => '39', 'profissao' => 'Motorista do Buzao']);
$tabela->adicionarLinha(['nome' => 'Olivia', 'idade' => '28', 'profissao' => 'Costureira']);
$tabela->adicionarLinha(['nome' => 'João', 'idade' => '40', 'profissao' => 'Pedrerão']);

echo "<pre>";
print_r($tabela->porId(1)->toJson());
echo "<pre>";
print_r($tabela->porId(2)->toArray());
echo "<pre>";
print_r($tabela->recuperar('nome','Olivia'));
print_r($tabela->substituir('nome','Luis', 'Antonio'));
print_r($tabela->destruir('nome','Antonio'));
echo "<br />";
print_r($tabela->todos());
