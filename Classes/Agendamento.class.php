<?php
    class Agendamento{
        private $agendamento_id;
        private $funcionario_id;
        private $cliente_id;
        private $total;
        private $data_atendimento;
        private $data_agendamento;
        private $horario_agendamento;

        public function __construct($agendamento_id=null, $funcionario_id=null, $cliente_id=null, $total=null, $data_agendamento=null, $data_atendimento=null, $horario_agendamento=null){
            if( $agendamento_id ){
                $this->agendamento_id = $agendamento_id;
                $this->carregamento_agendamento();
            } else {
                $this->funcionario_id = $funcionario_id;
                $this->cliente_id = $cliente_id;
                $this->total = $total;
                $this->data_atendimento = $data_atendimento;
                $this->data_agendamento = $data_agendamento;
                $this->horario_agendamento = $horario_agendamento;
            }
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'agendamento_id' && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'funcionario_id' && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'cliente_id' && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'total' && is_float($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'data_atendimento' && preg_match("@([0-9]{2}/([0-9]{2}/([0-9]{4})@", $valor) ){
                $data = new DateTime();
                $data->setDate('ano', 'mes', 'dia');

                $this->$atributo = $valor;
            }

            if( $atributo === 'data_agendamento' && preg_match("@([0-9]{2}/([0-9]{2}/([0-9]{4})@", $valor) ){
                $data = new DateTime();
                $data->setDate('ano', 'mes', 'dia');

                $this->$atributo = $valor;
            }

            if( $atributo === 'horario_agendamento' && preg_match($valor) ){
                $this->$atributo = $valor;
            }
        }

        //verificar se o total tem que ser carregado em uma função a parte, pois ela é o somatório de serviços.
        //exemplo public function carregar_total(), e dentro do INSERT será chamada essa função ($this->carregar_total).
        public function adicionar_agendamento(){
            $sql = "INSERT INTO agendamento VALUES (DEFAULT, {$this->funcionario_id}, {$this->cliente_id}, {$this->total}, '{$this->data_atendimento}', '{$this->data_agendamento}', '{$this->horario_agendamento}')";
            $qry = pg_query($sql);

            return pg_affected_rows($qry)? true : false;
        }

        public function carregar_total($vlr_servico){
            $this->total += $vlr_servico;

            return $this->total;
        }
    }
?>