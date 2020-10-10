<?php
    class Funcao{
        private $funcao_id;
        private $nome_funcao;

        public function __construct($funcao_id=null, $nome_funcao=null){
            if( $funcao_id ){
                $this->funcao_id = $funcao_id;
                $this->carregar_funcao();
            }
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
            $sql = "INSERT INTO funcao VALUES (DEFAULT, '{$this->nome_funcao}')";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_funcao(){
            $sql = "DELETE FROM funcao WHERE funcao_id = {$this->funcao_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function alterar_funcao(){
            $sql = "UPDATE funcao SET nome_funcao = '{$this->nome_funcao}' WHERE funcao_id = {$this->funcao_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_funcao(){
            $sql = "SELECT * FROM funcao";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);
                
                return $res;
            } else {
                return false;
            }
        }

        public function carregar_funcao(){
            $sql = "SELECT * FROM funcao WHERE funcao_id = {$this->funcao_id}";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_assoc($qry, 0);

                $this->nome_funcao = $res['nome_funcao'];

                return true;
            } else {
                return false;
            }
        }
    }
?>