<?php
    class Funcao{
        private $funcao_id;
        private $nome_funcao;

        public function __constructor($funcao_id=null, $nome_funcao=null){
            $this->funcao_id = $funcao_id;
            $this->nome_funcao = $nome_funcao;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === "funcao_id" && is_numeric($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "nome_funcao" && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_funcao(){
            echo
            $sql = " INSERT INTO funcao VALUES (DEFAULT, '{$this->nome_funcao}') ";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_funcao(){
            $sql = " DELETE * FROM funcao WHERE funcao_id = {$this->funcao_id} ";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }
    }
?>