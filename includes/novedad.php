<?php
    class Novedad {
        private $id = "";
        private $autor = "";
        private $descripcion = "";
        private $fecha = "";
        private $titulo = "";
        private $categorianovedades = "";

        //Constructor del tour
        public function __construct($id, $autor, $descripcion, $fecha, $titulo, $categorianovedades){
            $this->id=$id;
            $this->autor=$autor;
            $this->descripcion=$descripcion;
            $this->fecha=$fecha;
            $this->titulo=$titulo;
            $this->categorianovedades=$categorianovedades;
        }

        public function getid(){
            return $this->id;
        }
        public function setid($x){
            return $this->id=$x;
        }
        public function getautor(){
            return $this->autor;
        }
        public function setautor($x){
            return $this->autor=$x;
        }
        public function gettitulo(){
            return $this->titulo;
        }
        public function settitulo($x){
            return $this->titulo=$x;
        }
        public function getfecha(){
            return $this->fecha;
        }
        public function setfecha($x){
            return $this->fecha=$x;
        }
        public function getdescripcion(){
            return $this->descripcion;
        }
        public function setdescripcion($x){
            return $this->descripcion=$x;
        }
        public function getcategorianovedades(){
            return $this->categorianovedades;
        }
        public function setcategorianovedades($x){
            return $this->categorianovedades=$x;
        }
    }
?>