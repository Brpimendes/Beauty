<?php
    class Usuario{
        private $usuario_id;
        private $perfil_acesso_id;
        private $cliente_id;
        private $funcionario_id;
        private $profissional_id;
        private $login;
        private $senha;

        public function __construct($usuario_id=null, $perfil_acesso_id=null, $cliente_id = null, $funcionario_id = null, $profissional_id = null, $login=null, $senha=null){
            $this->usuario_id = $usuario_id;
            $this->perfil_acesso_id = $perfil_acesso_id;
            $this->cliente_id = $cliente_id;
            $this->funcionario_id = $funcionario_id;
            $this->profissional_id = $profissional_id;
            $this->login = $login;
            $this->senha = $senha;
        }

        public function __get($atributo){
            return $this->$atributo = $atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === "usuario_id" && is_numeric($atributo) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "perfil_acesso_id" && ( is_numeric($atributo) || is_null($atributo) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "cliente_id" && ( is_numeric($atributo) || is_null($atributo) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "funcionario_id" && ( is_numeric($atributo) || is_null($atributo) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "profissional_id" && ( is_numeric($atributo) || is_null($atributo) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "login" && is_string($atributo) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "senha" && is_string($atributo) ){
                $this->$atributo = $valor;
            }
        }

        public function Adicionar_Usuario(){            
            $sql = " INSERT INTO usuario VALUES ( DEFAULT, {$this->perfil_acesso_id}, {$this->cliente_id}, {$this->funcionario_id}, {$this->profissional_id}, '{$this->login}', md5('{$this->senha}') )";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function Consultar_Usuario(){
            $sql = " SELECT * FROM usuario WHERE id = {$this->id}, {perfil_acesso_id} = {$this->perfil_acesso_id}, cliente_id = {$this->cliente_id}, funcionario_id = {$this->funcionario_id}, profissional_id = {$this->profissional_id}, login = '{$this->login}', senha = '{$this->senha}' ";
            $qry = pg_query($sql);

            if ( pg_num_rows($qry) ){
                $ret = pg_fetch_all($qry);

                return $ret;
            } else {
                return false;
            }
        }

        public function Alterar_Usuario(){
            $sql = " UPDATE usuario SET id = {$this->id}, perfil_acesso_id = {$this->perfil_acesso_id}, cliente_id = {$this->cliente_id}, funcionario_id = {$this->funcionario_id}, profissional_id = {$this->profissional_id}, login = '{$this->login}', senha = '{$this->senha}' ";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function Excluir_Usuario(){
            $sql = " DELETE FROM usuario WHERE id = { $this->id } ";
            $qry = pg_query($sql);
            
            return pg_affected_rows($qry) ? true : false;
        }

        public function login_usuario(){
            $sql = " SELECT * FROM usuario WHERE login = '{$this->login}' AND senha = 'md5($this->senha)' ";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->usuario_id = $res[0]['usuario_id'];
				// $this->perfil_acesso_id = new Perfil_acesso($res[0]['perfil_acesso_id']);
				$this->cliente_id = new Cliente($res[0]['cliente_id']);
				// $this->funcionario_id = new Funcionario($res[0]['funcionario_id']);
				// $this->profissional_id = new Profissional($res[0]['profissional_id']);
				$this->login = $res[0]['login'];
                $this->senha = $res[0]['senha'];
                
                Session_Start();
				$_SESSION["id"] = $this->usuario_id;
				// $_SESSION["perfil"] = $this->perfil_acesso_id->nome;
                $_SESSION["nome"] = $this->cliente_id->nome;
                
				header('Location: agenda.php');
				return true;
			} else {
				return false;
			}            
        }
    }
?>