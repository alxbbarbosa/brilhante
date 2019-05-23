<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

/**
 * Esta classe define um formulário para blade
 *
 * @author Alexandre Bezerra Barbosa
 */
class formularioLaravel5 extends formulario
{
    protected $versao = '5.6';

    public function __construct(string $nome, string $metodo)
    {
        parent::__construct($nome, $metodo);
    }

}
