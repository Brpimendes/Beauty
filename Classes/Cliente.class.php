<?php
    class Cliente extends Usuario{
        private $nome;
        private $cpf;
        private $data_nasc;
        private $sexo;
        private $telefone;
        private $email;

        public function __construct($cliente_id=null, $nome=null, $cpf=null, $data_nasc=null, $sexo=null, $telefone=null, $email=null, $senha=null){
            if( $cliente_id ){
                $this->cliente_id = $cliente_id;
                $this->carregar_cliente();
            } else {
                $this->nome = $nome;
                $this->cpf = $cpf;
                $this->data_nasc = $data_nasc;
                $this->sexo = $sexo;
                $this->telefone = $telefone;
                $this->email = $email;
                $this->perfil_acesso_id = 1;
                $this->login = $email;
                $this->senha = $senha;
            }
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'cliente_id' && is_numeric($valor) ){
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

            if( $atributo === 'sexo' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'telefone' && is_string($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'email' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_cliente(){
            pg_query('BEGIN');
            $sql = " INSERT INTO cliente VALUES (DEFAULT, '{$this->nome}', '{$this->cpf}', '{$this->data_nasc}', '{$this->sexo}', '{$this->telefone}', '{$this->email}') RETURNING cliente_id ";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $this->cliente_id = pg_fetch_result($qry, 0, 'cliente_id');

                if ( $this->adicionar_usuario() ){
                    pg_query('COMMIT');

                    return true;
                }
            }

            pg_query('ROLLBACK');

            return false;
        }

        public function alterar_cliente(){
            $sql = " UPDATE cliente SET nome = '{$this->nome}', cpf = '{$this->cpf}', data_nasc = '{$this->data_nasc}', sexo = '{$this->sexo}', telefone = '{$this->telefone}', email = '{$this->email}' WHERE id = {$this->cliente_id} ";
            $qry = pg_query($qry);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_cliente(){
            pg_query('BEGIN');
            if ( $this->excluir_usuario() ){
                $sql = " DELETE FROM cliente WHERE cliente_id = {$this->cliente_id} ";
                $qry = pg_query($sql);

                if( pg_affected_rows($qry) ){
                    pg_query('COMMIT');

                    return true;
                }
            }

            pg_query('ROLLBACK');

            return false;
        }

        //Comentar coma Thais sobre a possibilidade de fazer a exclusão lógica dos dados.
        // public function exclui_logicamente(){
        //     pg_query('BEGIN');
        //     $sql = " UPDATE cliente SET cliente_ativo = FALSE where cliente_id = {$this->cliente_id} ";
        //     $qry = pq_query($sql);

        //     return pg_affected_rows($qry) ? true : false;
        // }

        public function consultar_cliente(){
            $sql = " SELECT * FROM cliente ";
            $qry = pg_query($sql);
            
            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregar_cliente(){
            $sql = " SELECT * FROM cliente cli 
                    INNER JOIN usuario u
                    ON cli.cliente_id = u.cliente_id 
                    WHERE cli.cliente_id = {$this->cliente_id} ";

            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_assoc($qry, 0);
                
                $this->nome = $res['nome'];
                $this->cpf = $res['cpf'];
                $this->data_nasc = $res['data_nasc'];
                $this->sexo = $res['sexo'];
                $this->telefone = $res['telefone'];
                $this->email = $res['email'];
                $this->perfil_acesso_id = $res['perfil_acesso_id'];
                $this->login = $res['email'];
                $this->senha = $res['senha'];
                // $this->cliente_ativo = $res['cliente_ativo'];


                return true;
            } else {
                return false;
            }
        }
    }
?>