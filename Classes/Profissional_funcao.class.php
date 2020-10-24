<?php
    class Profissional_funcao{
        private $profissional_id;
        private $funcao_id;

        public function __construct($profissional_id=null, $funcao_id=null){
            $this->profissional_id = $profissional_id;
            $this->funcao_id = $funcao_id;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'profissional_id' && $valor instanceof Profissional ){
                $this->$atributo = $valor;
            }
            
            if( $atributo === 'funcao_id' && $valor instanceof Funcao ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_profissional_funcao(){
            $sql = "INSERT INTO profissional_funcao VALUES ({$this->profissional_id->profissional_id}, {$this->funcao_id->funcao_id})";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_profissional_id(){
            $sql = "DELETE FROM profissional_funcao WHERE profissional_funcao_id = {$this->profissional_funcao_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_profissional_funcao(){
            $sql = "SELECT * FROM profissional_funcao";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }
    }
?>