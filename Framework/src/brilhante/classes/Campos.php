<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

/**
 * Classe Abstrata que contém os métodos padrões
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
abstract class Campos
{
    /**
     * Guarda o objeto Elemento formado para Rótulo - Label
     * @var Elemento
     */
    protected $rotulo;

    /**
     * Guarda o objeto Elemento formado para input
     * @var Elemento
     */
    protected $input;

    /**
     * Definir atributos para o Elemento rótulo
     * @param string $nome
     * @param type $valor
     */
    public function setAttrRotulo(string $nome, $valor = null)
    {
        $this->rotulo->adicionaAtributo($nome, $valor);
    }

    /**
     * Definir atributos para o Elemento input
     * @param string $nome
     * @param type $valor
     */
    public function setAttrInput(string $nome, $valor = null)
    {
        $this->input->adicionaAtributo($nome, $valor);
    }

    /**
     * Método deve ser implementado para se obter os elementos
     */
    abstract function get();
}
