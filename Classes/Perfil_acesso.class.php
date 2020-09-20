<?php
    class Perfil_acesso{
        private $perfil_acesso_id;
        private $nome;
        private $permissao;

        public function __construct($perfil_acesso_id, $nome, $permissao){
            $this->perfil_acesso_id = $perfil_acesso_id;
            $this->nome = $nome;
            $this->permissao = $permissao;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'perfil_acesso_id' && is_numeric($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'nome' && is_string($valor) ){
                $this->$valor = $atributo;
            }

            if( $atributo === 'permissao' && is_bool($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function cadastrar_perfil(){
            $sql = "INSERT INTO Perfil_acesso VALUES ({$this->perfil_acesso_id}, '{$this->nome}', '{$this->permissao}')";

            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_perfil(){
            $sql = "SELECT * FROM Perfil_acesso WHERE perfil_acesso_id = {$this->perfil_acesso_id} AND nome = '{$this->nome}' AND permissao = '{$this->permissao}' ";

            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $ret = pg_fetch_all($qry);

                return $ret;
            } else {
                return false;
            }
        }

        public function alterar_perfil(){
            $sql = "UPDATE Perfil_acesso SET nome = '{$this->nome}', permissao = '{$this->permissao}')";

            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_perfil(){
            $sql = "DELETE FROM Perfil_acesso WHERE perfil_id = {$this->perfil_acesso_id}, nome = '{$this->nome}' ";

            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }
    }
?>