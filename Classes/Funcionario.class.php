<?php
    class Funcionario{
        private $funcionario_id;
        private $cargo;
        private $nome;
        private $cpf;
        private $data_nasc;
        private $telefone;
        private $email;

        public function __contruct($funcionario_id, $cargo, $nome, $cpf, $data_nasc, $telefone, $email){
            $this->funcionario_id = $funcionario_id;
            $this->cargo = $cargo;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->data_nasc = $data_nasc;
            $this->telefone = $telefone;
            $this->email = $email;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'funcionario_id' && is_numeric($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'cargo' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'nome' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'cpf' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'data_nasc' && preg_match("@([0-9]{2})/([0-9]{2})/([0-9]{4})@", $valor) ){
                $date = new DateTime();
                $date->setDate('ano', 'mes', 'dia');

                $this->$atributo = $valor;
            }

            if( $atributo === 'telefone' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'email' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_funcionario(){
            
            $sql = " INSERT INTO funcionario VALUES (DEFAULT, '{$this->cargo}', '{$this->nome}', '{$this->cpf}', '{$this->data_nasc}', '{$this->telefone}', '{$this->email}') ";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function alterar_funcionario(){
            $sql = " UPDATE funcionario SET nome = '{$this->nome}', cpf = '{$this->cpf}', data_nasc = '{$this->data_nasc}', sexo = '{$this->sexo}', telefone = '{$this->telefone}', email = '{$this->email}' WHERE id = {$this->id} ";
            $qry = pg_query($qry);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_funcionario(){
            $sql = " DELETE FROM funcionario WHERE id = {$this->id} ";
            $qry = pg_query($sql);
            
            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_funcionario(){
            $sql = " SELECT * FROM funcionario WHERE id = {$this->id} ";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->id = $res[0]['id'];
                $this->cargo = $res[0]['cargo'];
                $this->nome = $res[0]['nome'];
                $this->cpf = $res[0]['cpf'];
                $this->data_nasc = $res[0]['data_nasc'];
                $this->telefone = $res[0]['telefone'];
                $this->email = $res[0]['email'];

                return true;
            } else {
                return false;
            }
        }
    }
?>