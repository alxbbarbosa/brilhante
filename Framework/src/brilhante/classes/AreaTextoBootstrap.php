<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe AreaTextoBootstrap
 * Aqui se está utilizando a composição de objetos
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class AreaTextoBootstrap extends AreaTexto
{
    /**
     * Atibuto que guarda o tamanho do rótulo
     * @var int
     */
    private $tamanhoColunaRotulo;

    /**
     * Atributo que guarda o tamanho do input
     * @var int
     */
    private $tamanhoColunaInput;


    /**
     * Criador da classe se basea na herança
     * @param type $rotulo
     * @param type $nome
     */
    public function __construct($rotulo, $nome)
    {

        parent::__construct($rotulo, $nome);
    }

    /**
     * Define tamanho do rótuno - aplicado na classe Bootstrap
     * @param int $valor
     */
    public function tamanhoRotulo(int $valor)
    {
        $this->tamanhoColunaRotulo = $valor;
    }

    /**
     * Define o tamanho do campo aplicado na classe do field
     * @param int $valor
     */
    public function tamanhoInput(int $valor)
    {
        $this->tamanhoColunaInput = $valor;
    }

    /**
     * Obtém os objetos configurados
     * @return Elemento Div contendo o rótulo e o input
     */
    public function get()
    {
        $this->rotulo->adicionaAtributo('class',
            'col-sm-'.((is_integer($this->tamanhoColunaRotulo) && $this->tamanhoColunaRotulo > 0) ? $this->tamanhoColunaRotulo : 1).' col-form-label text-right');
        $this->input->adicionaAtributo('class',
            'col-sm-'.((is_integer($this->tamanhoColunaInput) && $this->tamanhoColunaInput > 0) ? $this->tamanhoColunaInput : 1).' form-control');

        $div = Div::create();
        $div->adicionaAtributo('class', 'form-group form-row');
        $div->setValor(array($this->rotulo, $this->input));
        return $div;
    }
}
