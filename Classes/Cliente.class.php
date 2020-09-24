<?php
    class Cliente extends Usuario{
        protected $cliente_id;
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
            }

            return pg_affected_rows($qry) ? $this->adicionar_usuario() : false;
        }

        public function alterar_cliente(){
            $sql = " UPDATE cliente SET nome = '{$this->nome}', cpf = '{$this->cpf}', data_nasc = '{$this->data_nasc}', sexo = '{$this->sexo}', telefone = '{$this->telefone}', email = '{$this->email}' WHERE id = {$this->id} ";
            $qry = pg_query($qry);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluir_cliente(){
            $sql = " DELETE FROM cliente WHERE id = {$this->id} ";
            $qry = pg_query($sql);

            return pg__affected_rows($qry) ? true : false;
        }

        // public function consultar_cliente(){
        //     $sql = " SELECT * FROM cliente WHERE cliente_id = {$this->cliente_id} ";
        //     $qry = pg_query($sql);
            
        //     if( pg_num_rows($qry) ){
        //         $res = pg_fetch_all($qry);

        //         $this->cliente_id = $res[0]['cliente_id'];
        //         $this->nome = $res[0]['nome'];
        //         $this->cpf = $res[0]['cpf'];
        //         $this->data_nasc = $res[0]['data_nasc'];
        //         $this->sexo = $res[0]['sexo'];
        //         $this->telefone = $res[0]['telefone'];
        //         $this->email = $res[0]['email'];

        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

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

                return true;
            } else {
                return false;
            }
        }
    }
?>