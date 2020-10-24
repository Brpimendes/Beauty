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

            if( $atributo === 'data_atendimento' && preg_match($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'data_agendamento' && preg_match($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'horario_agendamento' && preg_match($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function adicionar_agendamento(){
            
        }
        public function excluir_agendamento(){

        }
        public function consultar_agendamento(){

        }
        public function alterar_agendamento(){

        }
        public function carregar_agendamento(){

        }
    }
?>