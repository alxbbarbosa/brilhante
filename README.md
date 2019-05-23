# Pacotes para desenho de páginas HTML

Um pacote que na realidade é a fusão de dois pacotes, os quais dei o nome de Brilhante e Fascinio. Ainda estão em desenvolvimento,
mas o objetivo é prover um meio de criar todo desenho de uma página Html. As classes que criam muitos componentes estão prontas.
Mas não foram deseenvolvidos classes para dividir a tela em colunas ou as Tags novas do HTML5. Contudo, é perfeitamente possivel
criar formulários completos, como você poderá ver no exemplo de utilização.

## Getting Started

Este projeto ainda está apenas aqui no GitHub. Para utiliza-lo você poderá cloná-lo.

### Prerequisites

PHP 7.x

## Example 

```php

// Criando uma Página com um formulário
$html = new Pagina('Teste Bootstrap');

// Adicionando elementos de cabecalho para Bootstrap
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

// Adicionando todos elementos ao cabecalho
$html->addHeaderContent(array($linkcssA, $linkcssB, $scriptA, $scriptB, $scriptC));

// Agora criar o formulario (Um exemplo aleatorio)
$card   = new CardBootstrap('Card dinâmico');

// Apenas para cirar varios campos do tipo input
$campos = array();
for ($i = 1; $i < 4; $i++) {
    $input = new campoTextoBootstrap("Teste {$i}:", "teste_{$i}");
    $input->tamanhoRotulo(2);
    $input->tamanhoInput(10);
    // Adicionar no elemento para o formulário
    $card->adicionarConteudo($input->get());
}

// Criar um textarea
$area = new AreaTextoBootstrap('Teste área:', 'teste_area');
$area->tamanhoRotulo(2);
$area->tamanhoInput(10);
$area->linhas(4);
// Adicionar no elemento para o formulário
$card->adicionarConteudo($area->get());

// Criar select
$select = new SelectBootstrap('Teste de select:', 'select_teste');
$select->tamanhoRotulo(2);
$select->tamanhoInput(10);
for ($a = 1; $a <= 10; $a++) {
    $select->adicionaItem($a, "Opção {$a}");
}
// Adicionar no elemento para o formulário
$card->adicionarConteudo($select->get());

// Criar select como caixa lista
$lista = new CaixaListaBootstrap('Teste de lista:', 'lista_teste');
$lista->tamanhoRotulo(2);
$lista->tamanhoInput(10);
for ($a = 1; $a <= 5; $a++) {
    $lista->adicionaItem($a, "Opção {$a}");
}
// Adicionar no elemento para o formulário
$card->adicionarConteudo($lista->get());

// Criar grupo de options radios
$options = new GrupoRadiosOptionsBootstrap('Grupo de options:', 'option_teste');
$options->tamanhoRotulo(2);
$options->tamanhoInput(10);
for ($a = 1; $a <= 4; $a++) {
    $options->adicionaOpcao($a, "Opção {$a}:");
}
// Adicionar no elemento para o formulário
$card->adicionarConteudo($options->get());

// Checkboxes
$check = new GrupoCheckboxesBootstrap('', 'check_teste');
$check->tamanhoRotulo(2);
$check->tamanhoInput(10);
for ($a = 1; $a <= 1; $a++) {
    $check->adicionaCheckbox($a, "Marcação {$a}:");
}
$check->setAttrInput('style', 'top:6px;');
$card->adicionarConteudo($check->get());

// Na realidade o formulário mesmo vem agora
$form = new Formulario('post', '#');
$form->addFormContent($card->get());

// Definir os botões
$button1 = new BotaoBootstrap('enviar', 'Enviar', true);
$button1->classBtn('success');
$button1->setIconAwsome('check');

$button2 = new BotaoBootstrap('cancelar', 'Cancelar');
$button2->classBtn('danger');
$button2->setIconAwsome('times');

$card->addContentFooter(array($button1->get(), $button2->get()));


// Desenhar divisões
$div = Div::create();
$div->adicionaAtributo('class', 'container');
$div->adicionaAtributo('style', 'position: relative; top: 40px;');
$div->setValor($form->get());

// Adicionar os elementos na pagina html
$html->addBodyContent($div);

// Gerar como HTML
echo buildHTML::go($html->get());
```

---

Mas ainda têm muito mais, veja como manipular tabelas usando a Fascinio junto com pacote Brilhante

```php

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

```

---

## Authors

* **Alexandre Bezerra Barbosa** - *Initial work* - [Exemplos MVC](https://github.com/alxbbarbosa)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
