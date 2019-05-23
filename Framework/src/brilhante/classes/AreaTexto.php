<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Campos;
use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe AreaTexto - Criar um campo com dois elementos: rótulo e input
 * Aqui se utiliza a composição de objetos
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class AreaTexto extends Campos
{
    /**
     * Guarda o número de linhas para o input
     * @var int
     */
    private $tamanhoLinhas;

    /**
     * Construtor
     * @param string $rotulo
     * @param string $nome
     */
    public function __construct(string $rotulo, string $nome)
    {
        $this->rotulo = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
        $this->input  = new Elemento('textarea');
        $this->input->adicionaAtributo('name', $nome);
        $this->input->adicionaAtributo('id', $nome);
    }

    /**
     * Definir quantas linhas serão vistas no objeto renderizado
     * @param int $linhas
     */
    public function linhas(int $linhas)
    {
        $this->tamanhoLinhas = $linhas;
    }

    /**
     * Obter o array de elemento contendo o rótulo e o input
     * @return array (Contém dois objetos do tipo Elemento)
     */
    public function get()
    {
        $this->input->adicionaAtributo('rows', $this->tamanhoLinhas);
        return array($this->rotulo, $this->input);
    }
}
