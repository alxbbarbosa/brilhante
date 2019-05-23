<?php

namespace InfoDinamics\Fascinio;

/**
 * Classe que define uma tabela de dados
 *
 * @author Alexandre Bezerra Barbosa
 */
class Tabela
{
    const IGUAL          = 1;
    const DIFERENTE      = 2;
    const MAIOR          = 3;
    const MAIOR_OU_IGUAL = 4;
    const MENOR_OU_IGUAL = 5;
    const RECUPERAR      = 6;
    const SUBSTITUIR     = 7;
    const DESTRUIR       = 8;

    protected $nome;
    protected $tabela;
    protected $colunas;

    public function __construct(array $args = [])
    {
        $this->tabela = [];
        
        if(count($args) >= 1) {
            $this->definirColunas($args);
        }
    }

    /**
     * É possivel definir colunas com uma linha de dados
     */
    public function definirColunas(array $colunas): bool
    {
        if($this->isAssoc($colunas)) {

            if($this->definirColunas(array_keys($colunas))){
                return $this->adicionarLinha($colunas);
            }
            
        } else {
            $this->colunas = $colunas;
        }
        return true;
    }

    /**
     * Novo Id
     * @return int
     */
    protected function novoId(): int
    {
        if (count($this->tabela) > 0) {
            $c = array_keys($this->tabela);
            return ((int) array_pop($c)) + 1;
        }
        return 1;
    }

    /**
     * Obtém linha pelo Id
     * @param int $id
     * @return array
     */
    public function porId(int $id)
    {
        $obj = null;

        if (isset($this->tabela[$id])) {
            $obj = $this->converterParaObjeto($this->tabela[$id], $id);
        }
        return $obj;
    }

    /**
     * Recuperar uma linha
     */
    public function recuperar(string $coluna, $valor, $operador = 1)
    {
        return $this->acaoSobreLinhaPorColuna($coluna, $valor, $operador, self::RECUPERAR);
    }

    /**
     * Subistituir uma linha
     */
    public function substituir(string $coluna, $valor_original, $valor_novo, $operador = 1)
    {
        return $this->acaoSobreLinhaPorColuna($coluna, $valor_original, $operador, self::SUBSTITUIR, $valor_novo);
    }

    /**
     * Destruir uma linha
     */
    public function destruir(string $coluna, $valor, $operador = 1)
    {
        return $this->acaoSobreLinhaPorColuna($coluna, $valor, $operador, self::DESTRUIR);
    }

    /**
     * Listar todos as linhas
     */
    public function todos(){
        foreach ($this->tabela as $id => $linha){
            $result[] = $this->converterParaObjeto($linha, $id);
        }
        return $result;
    }
    
    /**
     * Converte array para objetos
     */
    protected function converterParaObjeto(array $array, $id = null)
    {
        $response = new class {
            
            public $colunas;

            public function __construct()
            {
                $this->colunas = [];
            }

            public function __set($propriedade, $valor)
            {
                $this->colunas[$propriedade] = $valor;
                return $this;
            }

            public function __get($propriedade)
            {
                return $this->colunas[$propriedade];
            }

            public function __isset($propriedade)
            {
                return isset($this->colunas[$propriedade]);
            }

            public function toArray()
            {
                $count = count($this->colunas);
                $chaves  = array_keys($this->colunas); // Extrair as chaves do array
                $valores = array_values($this->colunas); // Extrair os valores do array
                
                $linha   = array();
                for ($c = 0; $c < $count; $c++) {
                        
                    if (is_scalar($valores[$c])) {
                        $linha += ["{$chaves[$c]}" => $valores[$c]];
                    } 
                }
                $response = $linha;
                
                return $response;
            }

            public function first(){
                return new self($this->toArray());
            }
            
            public function toJson()
            {
                return json_encode($this->colunas);
            }
        };
        $count = count($array);
        $chaves = array_keys($array);
        $valores = array_values($array);
        $response->id = $id;
        for($c = 0; $c < $count; $c++) {
            $response->{$chaves[$c]} = $valores[$c];
        }
        return $response;
    }

    /**
     * Obter linha conforme o valor para uma coluna e operação
     * @param string $coluna
     * @param type $valor
     * @return array
     */
    protected function acaoSobreLinhaPorColuna(string $coluna, $valor_original, $operador = self::IGUAL,
                                               $acao = self::RECUPERAR, $valor_novo = null): array
    {
        $result = [];
        if ($this->colunaExiste($coluna)) {

            foreach ($this->tabela as $id => $linha) {
                switch ($operador) {
                    case 1:
                        if ($linha[$coluna] == $valor_original) {

                            $result[] = $this->selecionaAcao($acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                    case 2:
                        if ($linha[$coluna] != $valor_original) {
                            $result[] = $this->selecionaAcao($acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                    case 3:
                        if ($linha[$coluna] > $valor_original) {
                            $result[] = $this->selecionaAcao($acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                    case 4:
                        if ($linha[$coluna] < $valor_original) {
                            $result[] = $this->selecionaAcao($acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                    case 5:
                        if ($linha[$coluna] > $valor_original) {
                            $result[] = $this->selecionaAcao($acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                    case 5:
                        if ($linha[$coluna] >= $valor_original) {
                            $result[] = $this->selecionaAcao($acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                    case 5:
                        if (isset($linha[$coluna]) && $linha[$coluna] <= $valor_original) {
                            $result[] = $this->selecionaAcao($$acao, $id, $coluna, $valor_original, $valor_novo);
                        }
                        break;
                }
            }
        }
        return $result;
    }

    /**
     * Verificar se coluna existe;
     * @param type $coluna
     * @return boolean
     */
    protected function colunaExiste($coluna)
    {
        foreach ($this->tabela as $linha) {
            if (isset($linha[$coluna])) {
                return true;
            }
            return false;
        }
    }

    /**
     * Seleciona a ação
     * @param int $acao
     * @param type $linha
     * @param type $valor
     * @return type
     */
    protected function selecionaAcao(int $acao, $id, $coluna, $valor_original, $valor_novo)
    {
        switch ($acao) {
            case 6: return $this->converterParaObjeto($this->tabela[$id], $id);
            case 7: return $this->substituindo($id, $coluna, $valor_novo);
            case 8: return $this->destruindo($id);
        }
    }

    /**
     * Executa a ação propriamente dita: substituir
     * @param type $linha
     * @param type $coluna
     * @param type $valor
     * @return type
     */
    protected function substituindo($id, $coluna, $valor_novo)
    {
        $linha                      = $this->converterParaObjeto($this->tabela[$id], $id);
        $this->tabela[$id][$coluna] = $valor_novo;
        return $linha;
    }

    /**
     * Executa a ação propriamente dita: destruir
     * @param type $linha
     * @return type
     */
    protected function destruindo($id)
    {
        $linha = $this->converterParaObjeto($this->tabela[$id], $id);
        unset($this->tabela[$id]);
        return $linha;
    }

    /**
     * Adicionar uma linha
     */
    public function adicionarLinha(array $dados)
    {
        $count = count($dados);

        if ($this->isAssoc($dados)) {
            $chaves  = array_keys($dados); // Extrair as chaves do array
            $valores = array_values($dados); // Extrair os valores do array
            $id      = $this->novoId();
            /**
             * Iterar sobre os arrays em paralelo e adicionar uma coluna conforme a iteração
             */
            $linha   = array();
            for ($c = 0; $c < $count; $c++) {

                if (is_scalar($valores[$c])) {
                    $linha += ["{$chaves[$c]}" => $valores[$c]];
                } else {
                    return false;
                }
            }
            $this->tabela[$id] = $linha;
        }
        return false;
    }

    /**
     * Verificar se array é associativo ou indexado
     * @param array $array
     * @return int
     */
    protected function isAssoc(array $array): int
    {
       /**
         * Extrair todas as chaves do array e verificar se é numerica ou não
         */
        $result = array_map(function($elemento) {
            if (is_int($elemento)) {
                return false;
            } else if (is_string($elemento)) {
                return true;
            }
        }, array_keys($array));

        $chaves = array_unique($result);
        
        if (count($chaves) > 1) {
            return false;
        }
        return $chaves[0];
    }
}