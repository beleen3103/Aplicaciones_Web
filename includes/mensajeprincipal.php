<?php
    class MensajePrincipal {
        private $idforo = "";
        private $idusuario = "";
        private $titulo = "";
        private $texto = "";

        //Getters
        public function getidforo(){
            return $this->idforo;
        }
        public function getidusuario(){
            return $this->idusuario;
        }
        public function gettitulo(){
            return $this->titulo;
        }
        public function gettexto(){
            return $this->texto;
        }

        //Setters
        public function setidforo($idforo){
            $this->idforo = $idforo;
        }
        public function setidusuario($idusuario){
            $this->idusuario = $idusuario;
        }
        public function settitulo($titulo){
            $this->titulo = $titulo;
        }
        public function settexto($texto){
            $this->texto = $texto;
        }
    }
?>
