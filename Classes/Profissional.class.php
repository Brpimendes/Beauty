<?php
    class Profissional extends Usuario{
        private $nome;
        private $data_nasc;
        private $cpf;
        private $telefone;
        private $email;

        public function __construct($profissional_id=null, $nome=null, $data_nasc=null, $cpf=null, $telefone=null, $email=null, $senha=null){
            if( $profissional_id ){
                $this->profissional_id = $profissional_id;
                $this->carregar_profissional();
            } else {
                $this->nome = $nome;
                $this->data_nasc = $data_nasc;
                $this->cpf = $cpf;
                $this->telefone = $telefone;
                $this->email = $email;
                $this->perfil_acesso_id = 2;
                $this->login = $email;
                $this->senha = $senha;
            }
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'profissional_id' && is_numeric($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'nome' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'data_nasc' && preg_match("@([0-9]{2})/([0-9]{2})/([0-9]{4})@", $valor) ){
                $date = new Datetime();
                $date->setDate('ano', 'mes', 'dia');

                $this->atributo = $valor;
            }

            if( $atributo === 'cpf' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'telefone' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'email' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }
        
        public function adicionar_profissional(){
            pg_query('BEGIN');
            $sql = " INSERT INTO profissional VALUES (DEFAULT, '{$this->nome}', '{$this->data_nasc}', '{$this->cpf}', '{$this->telefone}', '{$this->email}') RETURNING profissional_id";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $this->profissional_id = pg_fetch_result($qry, 0, 'profissional_id');

                if( $this->adicionar_usuario() ){
                    pg_query('COMMIT');
                    
                    return true;
                }
            }

            pg_query('ROLLBACK');

            return false;
        }

        public function alterar_profissional(){
            $sql = " UPDATE profissional SET nome = '{$this->nome}', data_nasc = '{$this->data_nasc}', cpf = '{$this->cpf}', telefone = '{$this->telefone}', email = '{$this->email}' 
                    WHERE profissional_id = {$this->profissional_id}";
            $qry = pg_query($sql);
            
            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_profissional(){
            $sql = " DELETE FROM profissional WHERE profissional_id = {$this->profissional_id}";

            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function consultar_profissional(){
            $sql = "SELECT * FROM profissional";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregar_profissional(){
            $sql = " SELECT * FROM profissional pro
                    INNER JOIN usuario u 
                    ON pro.profissional_id = u.profissional_id 
                    WHERE pro.profissional_id = {$this->profissional_id} ";
            
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->nome = $res[0]['nome'];
                $this->data_nasc = $res[0]['data_nasc'];
                $this->cpf = $res[0]['cpf'];
                $this->telefone = $res[0]['telefone'];
                $this->email = $res[0]['email'];
                $this->perfil_acesso_id = $res['perfil_acesso_id'];
                $this->login = $res['email'];
                $this->senha = $res['senha'];

                return true;
            } else {
                return false;
            }
        }
    }
?>