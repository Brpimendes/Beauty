<?php
    class Servicos{
        private $servicos_id;
        private $funcao_id;
        private $nome;
        private $valor;
        private $comissao;
        private $tempo_servico;

        public function __construct($servicos_id, $funcao_id, $nome, $valor, $comissao, $tempo_servico){
            $this->servicos_id = $servicos_id;
            $this->funcao_id = $funcao_id;
            $this->nome = $nome;
            $this->valor = $valor;
            $this->comissao = $comissao;
            $this->tempo_servico = $tempo_servico;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === "servico_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }
            
            if( $atributo === "servico_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "servico_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "servico_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "servico_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "servico_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }
        }
    }
?>