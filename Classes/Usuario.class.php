<?php
    class Usuario{
        protected $usuario_id;
        protected $perfil_acesso_id;
        protected $cliente_id;
        protected $funcionario_id;
        protected $profissional_id;
        protected $login;
        protected $senha;

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
            if( $atributo === "usuario_id" && is_numeric($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "perfil_acesso_id" && ( is_numeric($valor) || is_null($valor) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "cliente_id" && ( is_numeric($valor) || is_null($valor) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "funcionario_id" && ( is_numeric($valor) || is_null($valor) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "profissional_id" && ( is_numeric($valor) || is_null($valor) ) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "login" && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === "senha" && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_usuario(){
            $this->cliente_id = $this->cliente_id ? $this->cliente_id : "null";
            $this->funcionario_id = $this->funcionario_id ? $this->funcionario_id : "null";
            $this->profissional_id = $this->profissional_id ? $this->profissional_id : "null";

            $sql = " INSERT INTO usuario VALUES (DEFAULT, {$this->perfil_acesso_id}, {$this->cliente_id}, {$this->funcionario_id}, {$this->profissional_id}, '{$this->login}', md5('{$this->senha}') ) ";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_usuario(){
            $sql = " SELECT * FROM usuario WHERE id = {$this->id}, {perfil_acesso_id} = {$this->perfil_acesso_id}, cliente_id = {$this->cliente_id}, funcionario_id = {$this->funcionario_id}, profissional_id = {$this->profissional_id}, login = '{$this->login}', senha = '{$this->senha}' ";
            $qry = pg_query($sql);

            if ( pg_num_rows($qry) ){
                $ret = pg_fetch_all($qry);

                return $ret;
            } else {
                return false;
            }
        }

        public function alterar_usuario(){
            $sql = " UPDATE usuario SET id = {$this->id}, perfil_acesso_id = {$this->perfil_acesso_id}, cliente_id = {$this->cliente_id}, funcionario_id = {$this->funcionario_id}, profissional_id = {$this->profissional_id}, login = '{$this->login}', senha = '{$this->senha}' ";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_usuario(){
            // $this->cliente_id = $this->cliente_id ? $this->cliente_id : "null";
            // $this->funcionario_id = $this->funcionario_id ? $this->funcionario_id : "null";
            // $this->profissional_id = $this->profissional_id ? $this->profissional_id : "null";

            $sql = " DELETE FROM usuario WHERE login = '{$this->login}' ";
            $qry = pg_query($sql);
            
            return pg_affected_rows($qry) ? true : false;
        }

        public function login_usuario(){
            $sql = " SELECT * FROM usuario WHERE login = '{$this->login}' AND senha = md5('{$this->senha}') ";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->usuario_id = $res[0]['usuario_id'];

                session_start();
                $_SESSION["id"] = $this->usuario_id;
                $this->login = $res[0]['login'];
                $this->senha = $res[0]['senha'];

                if( $res[0]['cliente_id'] ){
                    $this->cliente_id = new Cliente($res[0]['cliente_id']);

                    $_SESSION['usuario'] = $this->cliente_id;

                    //Caso a Thais deixe passar a exclusão logica descomentar o codigo abaixo,
                    // ele faz a verificação do usuario se está ativo ou não para acessar o sistema
                    // if($this->cliente_ativo === false){
                    //     echo " Sem permissão para acessar o sistema. 
                        
                    //         Voltar para a página principal. Clique <a href='/'>aqui</a>
                    //     ";
                    // }

                    header('Location: agenda.php');
                }

                if( $res[0]['funcionario_id'] ){
                    $this->funcionario_id = new Funcionario($res[0]['funcionario_id']);

                    $_SESSION['usuario'] = $this->funcionario_id;

                    header('location: cadCliente.php');
                }

                if( $res[0]['profissional_id'] ){
                    $this->profissional_id = new Profissional($res[0]['profissional_id']);

                    $_SESSION['usuario'] = $this->profissional_id;

                    header('location: cadCliente.php');
                }
                
				return true;
			} else {
				return false;
			}            
        }
    }
?>