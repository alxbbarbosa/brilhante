<?php

namespace InfoDinamics\Brilhante\Html\Gadgets;

use InfoDinamics\Brilhante\Html\Gadgets\Elemento;

/**
 * buildHTML: Classe com o método estático que a nível de classe constrói toda estrutura
 *
 * @author Alexandre Bezerra barbosa
 * @email alexandre_b_barbosa@yahoo.com.br
 */
class buildHTML
{

    /**
     * Adiciona espaços necessários
     * @param int $qtd
     * @return string
     */
    public static function addSpaces(int $qtd)
    {
        $add = null;
        if ($qtd > 0) {
            for ($i = 0; $i <= ($qtd * 4); $i++) {
                $add .= ' ';
            }
        }
        return $add;
    }

    /**
     * gerar as linhas
     * @param mixed $data
     * @param int $interaction
     * @return string
     */
    public static function go(Elemento $data, $interaction = 0): string
    {
        $attr = null;
        if ($data->atributosDefinidos()) {
            foreach ($data->getAtributosAsArray() as $k => $v) {
                if (!is_null($v)) {
                    $attr .= " {$k}='$v'";
                } else {
                    $attr .= " {$k}";
                }
            }
        }

        if ($data->getAbreFecha() == false && ($data->getValor() == '' || !($data->getValor() instanceof Elemento))) {
            $str = self::addSpaces($interaction)."<".$data->tag();

            if (!is_null($data->getValor())) {
                $str .= " value='".$data->getValor()."'";
            }
            return $str .= "{$attr} />\n";
        } else {
            if (!($data->getValor() instanceof Elemento)) {
                if (is_array($data->getValor())) {

                    $add   = null;
                    $nivel = $interaction;
                    $interaction++;
                    // Se for um array de elementos, iterar sobre eles
                    foreach ($data->getValor() as $linha) {
                        // Pode ser que haja um array para esta linha de elementos
                        if (is_array($linha)) {
                            foreach ($linha as $it) {
                                $add .= self::go($it, $interaction);
                            }
                        } else {
                            $add .= self::go($linha, $interaction);
                        }
                    }
                    return self::addSpaces($nivel)."<".$data->tag()."{$attr}>\n".$add.self::addSpaces($nivel)."</".$data->tag().">\n";
                } else {
                    $str = self::addSpaces($interaction)."<".$data->tag()."{$attr}>".$data->getValor()."</".$data->tag().">\n";
                    return $str;
                }
            } else {
                return self::addSpaces($interaction)."<".$data->tag()."{$attr}>\n".self::go($data->getValor(), ++$interaction).self::addSpaces( --$interaction)."</".$data->tag().">\n";
            }
        }
    }
}
