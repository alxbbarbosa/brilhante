<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * Classe Abstrata que contém os métodos padrões
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
abstract class Tag
{
    /**
     * Guarda o objeto Elemento formado para input
     * @var Elemento
     */
    protected $elemento;

    /**
     * Definir atributos para o elemento
     * @param string $nome
     * @param type $valor
     */
    public function setAttr(string $nome, $valor = null)
    {
        $this->elemento->adicionaAtributo($nome, $valor);
    }

    /**
     * Método deve ser implementado para se obter os elementos
     */
    abstract function get();
}
