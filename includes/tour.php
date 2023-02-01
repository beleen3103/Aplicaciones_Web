<?php
    class Tour {
        private $nombreTour = "";
        private $precio = "";
        private $numreferencia = "";
        private $numeroplazas = "";
        private $descripcion = "";
        private $categoriatour = "";
        private $urltour = "";
        
        //Constructor del tour
        public function __construct($nombreTour, $precio, $numreferencia, $numeroplazas, $categoriatour, $descripcion, $urltour){
            $this->nombreTour=$nombreTour;
            $this->precio=$precio;
            $this->numreferencia=$numreferencia;
            $this->numeroplazas=$numeroplazas;
            $this->descripcion=$descripcion;
            $this->categoriatour=$categoriatour;
            $this->urltour=$urltour;
        }

        //Getters
        public function getNombreTour(){
            return $this->nombreTour;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function getNumReferencia(){
            return $this->numreferencia;
        }
        public function getNumeroPlazas(){
            return $this->numeroplazas;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getCategoriaTour(){
            return $this->categoriatour;
        }
        public function getUrlTour(){
            return $this->urltour;
        }

        //Setters
        public function setNombreTour($nombreTour){
            $this->nombreTour = $nombreTour;
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function setNumReferencia($numreferencia){
            $this->numreferencia = $numreferencia;
        }
        public function setNumeroPlazas($numeroplazas){
            $this->numeroplazas = $numeroplazas;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function setCategoriaTour($categoriatour){
            $this->categoriatour = $categoriatour;
        }
        public function setUrlTour($urltour){
            $this->urltour =$urltour;
        }

        //Mostrar
        public function mostrarTour(){
            return $this->urltour;
        }
    }
?>
