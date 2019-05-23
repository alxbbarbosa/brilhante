<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Select;

/**
 * Class CaixaLista
 *
 * InfoDinamics Development
 * @author Alexandre Bezerra Barbosa
 */
class CaixaLista extends Select
{

    public function __construct(string $rotulo, string $nome)
    {
        parent::__construct($rotulo, $nome);
    }

    public function get()
    {
        $this->input->adicionaAtributo('multiple');
        return parent::get();
    }
}
