<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\RadioOption;
use InfoDinamics\Brilhante\Html\Gadgets\Campos;
use InfoDinamics\Brilhante\Html\Gadgets\Div;

/**
 * GrupoRadiosOptions - Cria dois ou mais elementos radios
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class GrupoRadiosOptions extends Campos
{
    protected $group;
    protected $options;
    protected $nome;

    public function __construct($rotulo, $nome)
    {
        $this->group = Div::create();
        $this->nome   = $nome;
        $this->rotulo = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
    }

    public function adicionaOpcao($valor, string $rotulo, bool $selecionado = false)
    {
        $this->options[] = array('valor' => $valor, 'rotulo' => $rotulo, 'selecionado' => $selecionado);
    }

    /**
     * Construir o grupo de opções
     */
    public function constroiOpcoes()
    {
        
        foreach ($this->options as $option) {
            $new = new RadioOption($option['rotulo'], $this->nome);
            if ($option['selecionado']) {
                $new->adicionaAtributo('checked', 'checked');
            }
            $this->group->adicionarConteudo($new->get());
        }
        return true;
    }

    /**
     * Definir atributos para o Elemento input
     * @param string $nome
     * @param type $valor
     */
    public function setAttrInput(string $nome, $valor = null)
    {
        $this->group->adicionaAtributo($nome, $valor);
    }

    /**
     * Obtém um array com os elementos configurados
     * @return array (Contendo objetos do tipo Elemento)
     */
    public function get()
    {
        if ($this->constroiOpcoes()) {
            return array($this->rotulo, $this->group);
        }
    }
}
