<?php
    class Favorito {
        private $id = "";
        private $idusuario="";
        private $idtour="";

        public function getid(){
            return $this->id;
        }
        public function setid($x){
            return $this->id=$x;
        }
        public function getidusuario(){
            return $this->idusuario;
        }
        public function setidusuario($x){
            return $this->idsusario=$x;
        }
        public function getidtour(){
            return $this->idtour;
        }
        public function setidtour($x){
            return $this->idtour=$x;
        }

    }
?>