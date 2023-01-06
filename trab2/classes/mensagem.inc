<?php
    class Mensagem{
        public $id;
        public $titulo;
        public $conteudo;
        public $lido;
        public $remetente;
        public $destinatario;

        public function setMensagem($titulo, $conteudo, $remetente, $destinatario){
            $this->titulo = $titulo;
            $this->conteudo = $conteudo;
            $this->remetente = $remetente;
            $this->destinatario = $destinatario;
        }
        public function getMensagem_id(){
            return $this->id;
        }
        public function getMensagem_titulo(){
            return $this->titulo;
        }
        public function getMensagem_conteudo(){
            return $this->conteudo;
        }
        public function getMensagem_lido(){
            return $this->lido;
        }
        public function getMensagem_remetente(){
            return $this->remetente;
        }
        public function getMensagem_destinatario(){
            return $this->destinatario;
        }
        public function setMensagem_id($id){
            $this->id = $id;
        }
        public function setMensagem_titulo($titulo){
            return $this->titulo = $titulo;
        }
        public function setMensagem_conteudo($conteudo){
            return $this->conteudo = $conteudo;
        }
        public function setMensagem_lido($lido){
            return $this->lido = $lido;
        }
        public function setMensagem_remetente($remetente){
            return $this->remetente = $remetente;
        }
        public function setMensagem_destinatario($destinatario){
            return $this->destinatario = $destinatario;
        }





    }



?>