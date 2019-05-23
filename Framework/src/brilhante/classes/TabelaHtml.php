<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Table;
use InfoDinamics\Brilhante\Html\Gadgets\Thead;
use InfoDinamics\Brilhante\Html\Gadgets\Tbody;
use InfoDinamics\Brilhante\Html\Gadgets\Tr;
use InfoDinamics\Brilhante\Html\Gadgets\Th;
use InfoDinamics\Brilhante\Html\Gadgets\Td;
use InfoDinamics\Fascinio\Html\Gadgets\Tabela;

/**
 * Classe para criar tabelaHtml
 * Esta classe extende tabela de Fascinio
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class TabelaHtml extends Tabela
{
    protected $name;
    protected $tableHtml;

    public function __construct(string $name = null, string $id = null, $colunas = null)
    {
        $this->tableHtml = Table::create($id);
        if (!is_null($name)) {
            $this->tableHtml->adicionaAtributo('name', $name);
        }
        parent::__construct($colunas);
    }

    /**
     * Adiciona um atributo ao botão
     * @param string $nome
     * @param type $valor
     */
    public function adicionaAtributo(string $nome, $valor = null)
    {
        $this->tableHtml->adicionaAtributo($nome, $valor);
    }

    /**
     * Obtem um atributo
     * @return type
     */
    public function getAtributo(string $nome): string
    {
        return $this->tableHtml->getAtributo($nome);
    }

    /**
     * Listar todos as linhas
     */
    public function todos()
    {
        $novoThead       = Thead::create();
        $novaLinhaTabela = Tr::create();
        $colunaThead     = [];
        foreach ($this->colunas as $coluna) {
            $novoTh        = Th::create();
            $novoTh->setValor($coluna);
            $colunaThead[] = $novoTh;
        }
        $novoThead->setValor($novaLinhaTabela->setValor($colunaThead));

        $novoTbody     = Tbody::create();
        $arrayDeLinhas = [];
        foreach ($this->tabela as $id => $linha) {
            $linhaParaTabela = array();
            $novaLinha       = Tr::create();
            $count           = count($linha);
            $chaves          = array_keys($linha); // Extrair as chaves do array
            $valores         = array_values($linha); // Extrair os valores do array
            $novaLinhaTabela = Tr::create();
            for ($c = 0; $c < $count; $c++) {
                if (is_scalar($valores[$c])) {

                    $novaColunaTabela  = Td::create();
                    $novaColunaTabela->adicionaAtributo('column', $chaves[$c]);
                    $novaColunaTabela->setValor($valores[$c]);
                    $linhaParaTabela[] = $novaColunaTabela;
                }
            }
            $arrayDeLinhas[] = $novaLinhaTabela->setValor($linhaParaTabela);
        }
        $novoTbody->setValor($arrayDeLinhas);

        $this->tableHtml->setValor([$novoThead, $novoTbody]);

        return $this->tableHtml;
    }
}
