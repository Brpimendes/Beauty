<?php
    class Servicos{
        private $servicos_id;
        private $funcao_id;
        private $nome;
        private $valor;
        private $comissao;
        private $tempo_servico;

        public function __construct($servicos_id=null, $funcao_id=null, $nome=null, $valor=null, $comissao=null, $tempo_servico=null){
            if( $servicos_id ){
                $this->servicos_id = $servicos_id;
                $this->carregar_servico();
            } else {
                $this->funcao_id = $funcao_id;
                $this->nome = $nome;
                $this->valor = $valor;
                $this->comissao = $comissao;
                $this->tempo_servico = $tempo_servico;
            }
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === "servicos_id" && is_int($valor) ){
                $this->$atributo = $valor;
            }
            
            if( $atributo === "funcao_id" && $valor instanceof Funcao ){
                $this->$atributo = $valor;
            }

            if( $atributo === "nome" && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "valor" && is_float($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "comissao" && is_float($valor) ){
                $this->$atributo = $valor / 100;
            }

            if( $atributo === "tempo_servico" && preg_match("@([0-9]{2}):([0-9]{2}):([0-9]{2})@", $valor) ){
                $tempo = new Datetime();

                $this->$atributo = $valor;
            }
        }

        public function adicionar_servico(){
            $sql = "INSERT INTO servicos VALUES ( DEFAULT, {$this->funcao_id->funcao_id}, '{$this->nome}', {$this->valor}, {$this->comissao}, '{$this->tempo_servico}' )";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_servico(){
            $sql = "DELETE FROM servicos WHERE servicos_id = {$this->servicos_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function alterar_servico(){
            $sql = "UPDATE servicos SET funcao_id = {$this->funcao_id}, nome = '{$this->nome}', valor = {$this->valor}, comissao{$this->comissao}, {$this->tempo_servico} 
                    WHERE servicos_id = {$this->servicos_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_servico(){
            $sql = "SELECT * FROM servicos";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregar_servico(){
            $sql = "SELECT * FROM servicos WHERE servicos_id = {$this->servicos_id}";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_assoc($qry, 0);

                $this->servicos_id = $res['servicos_id'];
                $this->funcao_id = $res['funcao_id'];
                $this->nome = $res['nome'];
                $this->valor = $res['valor'];
                $this->comissao = $res['comissao'];
                $this->tempo_servico = $res['tempo_servico'];

                return true;
            } else {
                return false;
            }
        }


    }
?>