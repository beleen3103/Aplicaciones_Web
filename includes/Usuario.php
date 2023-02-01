<?php
    class Usuario {
        private $nombreusuario = "";
        private $correo = "";
        private $contrasenia = "";
        private $rol = "";
        private $telefono = "";
        private $nick = "";
        private $direccion = "";
        private $urlfoto = "";

        public function getnombreusuario(){
            return $this->nombreusuario;
        }
        public function setnombreusuario($x){
            return $this->nombreusuario=$x;
        }
        public function getcorreo(){
            return $this->correo;
        }
        public function setcorreo($x){
            return $this->correo=$x;
        }
        public function getcontrasenia(){
            return $this->contrasenia;
        }
        public function setcontrasenia($x){
            return $this->contrasenia=$x;
        }
        public function getrol(){
            return $this->rol;
        }
        public function setrol($x){
            return $this->rol=$x;
        }
        public function gettelefono(){
            return $this->telefono;
        }
        public function settelefono($x){
            return $this->telefono=$x;
        }
        public function getnick(){
            return $this->nick;
        }
        public function setnick($x){
            return $this->nick=$x;
        }
        public function getdireccion(){
            return $this->direccion;
        }
        public function setdireccion($x){
            return $this->direccion=$x;
        }
        public function geturlfoto(){
            return $this->urlfoto;
        }
        public function seturlfoto($x){
            return $this->urlfoto=$x;
        }
    }
?>