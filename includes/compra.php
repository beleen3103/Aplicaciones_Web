<?php
    class Compra {
        private $idcompra = "";
	    private $idcorreo = "";
	    private $descripcion = "";
        private $fecha = "";
        private $idtour = "";
        private $precio = 0;
        private $plazas = 0;

	public function getidcompra(){
            return $this->idcompra;
        }
        public function setidcompra($x){
            return $this->idcompra=$x;
        }
        public function getidCorreo(){
            return $this->idcorreo;
        }
        public function setidCorreo($x){
            return $this->idcorreo=$x;
        }
    	public function getDescripcion(){
            return $this->descripcion;
        }
        public function setDescripcion($x){
            return $this->descripcion=$x;
	}	
        public function getFecha(){
            return $this->fecha;
        }
        public function setFecha($x){
            return $this->fecha=$x;
        }
        public function getidTour(){
            return $this->idtour;
        }
        public function setidTour($x){
            return $this->idtour=$x;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function setPrecio($x){
            return $this->precio=$x;
        }
        public function getPlazas(){
            return $this->plazas;
        }
        public function setPlazas($x){
            return $this->plazas=$x;
        }
    }
?>