<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Div;
use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Checkbox;

/**
 * GrupoCheckboxes
 *
 * @author Alexandre Bezerra Barbosa
 */
class GrupoCheckboxes extends Campos
{
    protected $group;
    protected $checkboxes;
    protected $nome;

    public function __construct($rotulo, $nome)
    {
        $this->group = Div::create();
        $this->checkboxes = array();
        $this->nome       = $nome;
        $this->rotulo     = new Elemento('label');
        $this->rotulo->adicionaAtributo('for', $nome);
        $this->rotulo->setValor($rotulo);
    }

    public function adicionaCheckbox($valor, string $rotulo, bool $selecionado = false)
    {
        $this->checkboxes[] = array('valor' => $valor, 'rotulo' => $rotulo, 'selecionado' => $selecionado);
    }

    /**
     * Construir o grupo de opções
     */
    public function constroiCheckboxes()
    {
        foreach ($this->checkboxes as $checkbox) {
            $new = new Checkbox($checkbox['rotulo'], $this->nome);
            if ($checkbox['selecionado']) {
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
        if ($this->constroiCheckboxes()) {
            return array($this->rotulo, $this->group);
        }
    }
}
