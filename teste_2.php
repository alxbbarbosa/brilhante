<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/vendor/autoload.php';

use \InfoDinamics\Fascinio\Html\Gadgets\Tabela;
use \InfoDinamics\Brilhante\Html\Gadgets\buildHTML;
use \InfoDinamics\Brilhante\Html\Gadgets\TabelaHtml;

$tabela = new TabelaHtml(null, null,
    ['nome' => 'João Silva', 'idade' => '39', 'profissao' => 'Programador PHP']);


/**
 * Resultado como array associativo podem se passados aqui como argumento
 */
$tabela->adicionarLinha(['nome' => 'Silvia Maria', 'idade' => '39', 'profissao' => 'Costureira']);
$tabela->adicionarLinha(['nome' => 'João Ricardo', 'idade' => '40', 'profissao' => 'Pedrerão']);

echo buildHTML::go($tabela->todos());

echo "<br />Se chegou até aqui sem erro ... hum... você fez tudo certo!";

echo "<pre>";
$tabela = new Tabela;
$tabela->definirColunas(['nome', 'idade', 'profissao']);
$tabela->adicionarLinha(['nome' => 'Marco Antonio', 'idade' => '39', 'profissao' => 'Programador PHP']);
$tabela->adicionarLinha(['nome' => 'Silvia Maria', 'idade' => '39', 'profissao' => 'Costureira']);
$tabela->adicionarLinha(['nome' => 'João Ricardo', 'idade' => '40', 'profissao' => 'Pedrerão']);
/* Todos o métodos abaixo funcionam normalmente */
// JSON
print_r($tabela->porId(1)->toJson());
echo "<br />";
// ARRAY
print_r($tabela->porId(2)->toArray());
echo "<br />";

// Recuperando apenas uma das linhas por nome
print_r($tabela->recuperar('nome', 'Silvia Maria'));
// Substituir um valor por outro, veja que aqui será mostrado o valor antigo ainda
print_r($tabela->substituir('nome', 'João Ricardo', 'Luis Silva'));
// Destruir o valor por nome, note que não será mostrado da lista para exibir todos
print_r($tabela->destruir('nome', 'Luis Silva'));
echo "<br />";
print_r($tabela->todos());

/**
 * Exemplo de iterações Foreach
 */
foreach ($tabela->todos() as $linha) {
    echo $linha->id.' - '.$linha->nome.'<br />';
}
