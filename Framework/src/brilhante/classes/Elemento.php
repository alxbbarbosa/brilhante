<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

/**
 * Classe Elemento de formulário
 *
 * Info Dinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class Elemento
{
    /**
     * Define a tag de elemento
     * @var string
     */
    protected $tag;

    /**
     * Guarda o valor do elemento
     * @var Elemento ou Array
     */
    protected $valor;

    /**
     * Define outros atributos;
     *
     * @var array
     */
    protected $atributos;

    /**
     * Define se a tag abre e fecha
     * @var type
     */
    public $abreFecha;

    /**
     * Construtor da classe de elemento
     * @param string $nome
     * @param string $tipo
     * @param type $valor
     * @param string $rolulo
     */
    public function __construct(string $tag = null, $abre_fecha = true)
    {
        $this->atributos  = array();
        $this->tag        = $tag;
        $this->abre_fecha = $abre_fecha;
    }

    /**
     * Devolve valor
     * @return mixed valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Obtem um atributo
     * @return type
     */
    public function getAtributo(string $nome): string
    {
        return $this->atributos[$nome];
    }

    /**
     * Obter a tag
     * @return string
     */
    public function tag(): string
    {
        return $this->tag;
    }

    /**
     * Descobrir se é do tipo abre e fecha
     * @return bool
     */
    public function getAbreFecha(): bool
    {
        return $this->abre_fecha;
    }

    /**
     * Define um valor
     * Este método deve ignorar próximas reentradas se já estiver tipado como array
     * @param type $valor
     * @return $this
     */
    public function setValor($valor)
    {
        if (!is_array($this->valor)) {
            $this->valor = $valor;
        }
        return $this;
    }

    /**
     * Este método de entrada de elementos destroi entradas anteriores e começa a receber como array
     * 
     * @param array/Elemento $elemento
     */
    public function adicionarConteudo($elemento)
    {
        if (!is_array($this->valor)) {
            $this->valor = null;
            $this->valor = array();
        }
        if (is_array($elemento)) {
            foreach ($elemento as $e) {
                $this->valor[] = $e;
            }
        } else {
            $this->valor[] = $elemento;
        }
    }

    /**
     * Adiciona um atributo ao botão
     * @param string $nome
     * @param type $valor
     */
    public function adicionaAtributo(string $nome, $valor = null)
    {
        $this->atributos[$nome] = $valor;
    }

    /**
     * Obter os atributos como array
     * @return array
     */
    public function getAtributosAsArray()
    {
        return $this->atributos;
    }

    /**
     * Verificar se os atributos foram definidos
     * @return boolean
     */
    public function atributosDefinidos()
    {
        if (count($this->atributos) > 0) {
            return true;
        }
        return false;
    }
}
