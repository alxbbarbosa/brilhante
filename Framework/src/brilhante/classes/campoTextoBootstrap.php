<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;
use InfoDinamics\Brilhante\Html\Gadgets\Div;

/**
 * Classe para criar o campo como bootstrap
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class campoTextoBootstrap extends campoTexto
{
    /**
     * Guardar o tamanho do rótulo - Label (Classe Bootstrap)
     * @var int
     */
    private $tamanhoColunaRotulo;

    /**
     * Guardar p tamanho do input - Classe Bootstrap
     * @var type
     */
    private $tamanhoColunaInput;

    /**
     * Construtor
     * @param string $rotulo
     * @param string $nome
     */
    public function __construct(string $rotulo, string $nome)
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
     * Para este grupo de elementos é possivel definir o tamanho dos dois elementos
     * @param int $rotulo
     * @param int $input
     */
    public function tamanho(int $rotulo, int $input)
    {
        $this->tamanhoColunaRotulo = $rotulo;
        $this->tamanhoColunaInput  = $input;
    }

    /**
     * Obtém os objetos configurados
     * @return Elemento
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
