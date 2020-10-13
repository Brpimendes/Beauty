<?php
    class FormaPagamento{
        private $forma_pagamento_id;
        private $forma_pagamento;

        public function __construct($forma_pagamento_id=null, $forma_pagamento=null){
            if( $forma_pagamento_id ){
                $this->forma_pagamento_id = $forma_pagamento_id;
                $this->carregar_forma_pagamento();
            } else {
                $this->forma_pagamento = $forma_pagamento;
            }
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'forma_pagamento_id' && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'forma_pagamento' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_forma_pagamento(){
            $sql = "INSERT INTO forma_pagamento VALUES (DEFAULT, '{$this->forma_pagamento}')";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_forma_pagamento(){
            $sql = "DELETE FROM forma_pagamento WHERE forma_pagamento_id = {$this->forma_pagamento_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function alterar_forma_pagamento(){
            echo
            $sql = "UPDATE forma_pagamento SET forma_pagamento = '{$this->forma_pagamento}' 
                    WHERE forma_pagamento_id = {$this->forma_pagamento_id}";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_forma_pagamento(){
            $sql = "SELECT * FROM forma_pagamento";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregar_forma_pagamento(){
            $sql = "SELECT * FROM forma_pagamento WHERE forma_pagamento_id = {$this->forma_pagamento_id}";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_assoc($qry, 0);

                $this->forma_pagamento = $res['forma_pagamento'];

                return true;
            } else {
                return false;
            }
        }
    }
?>