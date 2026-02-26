<?php

class Validacao
 {
    public $validacoes;

    public static function validar($regras, $dados)
    {
        $validacao = new self;

        foreach ($regras as $campo => $regrasDoCampo) {
            foreach($regrasDoCampo as $regra) {
                $valorDoCampo = $dados[$campo];

                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                } else {
                    $validacao->$regra($campo, $valorDoCampo);
                }
                
            }
        }

        return $validacao;
    }

    private function required($campo)
    {
        if (!$campo) {
            $this->validacoes[] = "O $campo é obrigatório.";
        }      
    }

    private function email($campo)
    {

        if (!filter_var($campo, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[] = "O $campo é inválido";
        }
    }

    private function confirmed($campo, $campoDeConfirmacao)
    {
        if ($campoDeConfirmacao != $campo) {
            $this->validacoes[] = "O $campo de confirmação não confere";
        }
    }

    public function naoPassou()
    {

        return sizeof($this->validacoes) > 0;

    }
 }