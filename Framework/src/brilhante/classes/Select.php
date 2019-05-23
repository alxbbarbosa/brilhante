<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Campos;

/**
 * Classe Select - Dropdown
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Select extends Campos
{
    /**
     * Array que guarda as opções do elemento
     * @var type 
     */
    protected $itens;

    /**
     * Construtor
     * @param string $rotulo
     * @param string $nome
     */
    public function __construct(string $rotulo, string $nome)
    {
        $this->itens  = array();
        $this->rotulo = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
        $this->input  = new Elemento('select');
        $this->input->adicionaAtributo('name', $nome);
        $this->input->adicionaAtributo('id', $nome);
    }

    public function adicionaItem($valor, string $rotulo, bool $selecionado = false)
    {
        $this->itens[] = array('valor' => $valor, 'rotulo' => $rotulo, 'selecionado' => $selecionado);
    }

    /**
     * Adicionar os elementos ao select
     */
    public function constroiItens()
    {
        if (count($this->itens) > 0) {
            foreach ($this->itens as $item) {
                $new = new Elemento('option');
                $new->setValor($item['rotulo']);
                $new->adicionaAtributo('value', $item['valor']);
                if ($item['selecionado']) {
                    $new->adicionaAtributo('selected');
                }
                $this->input->adicionarConteudo($new);
            }
        }
        return true;
    }

    /**
     * Obter o array de elemento contendo o rótulo e o input
     * @return array (Contém dois objetos do tipo Elemento)
     */
    public function get()
    {
        /**
         * Invocar método para contruir os itens no elemento
         */
        if ($this->constroiItens()) {
            return array($this->rotulo, $this->input);
        }
    }
}
