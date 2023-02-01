<?php
    class Valoracion {
        private $idvaloracion = "";
        private $idusuario = "";
        private $idtour = "";
        private $valoracion = "";

        public function getidvaloracion(){
            return $this->idvaloracion;
        }
        public function setidvaloracion($x){
            return $this->idvaloracion=$x;
        }
        public function getidusuario(){
            return $this->idusuario;
        }
        public function setidusuario($x){
            return $this->idusuario=$x;
        }
        public function getidtour(){
            return $this->idtour;
        }
        public function setidtour($x){
            return $this->idtour=$x;
        }
        public function getvaloracion(){
            return $this->valoracion;
        }
        public function setvaloracion($x){
            return $this->valoracion=$x;
        }
    }
?>