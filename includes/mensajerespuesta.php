<?php
    class MensajeRespuesta {
        private $idrespuesta = "";
        private $idforoprincipal = "";
        private $iduserpublica = "";
        private $iduserresponde = "";
        private $texto = "";

        //Getters
        public function getidrespuesta(){
            return $this->idrespuesta;
        }
        public function getidforoprincipal(){
            return $this->idforoprincipal;
        }
        public function getiduserpublica(){
            return $this->iduserpublica;
        }
        public function getiduserresponde(){
            return $this->iduserresponde;
        }
        public function gettexto(){
            return $this->texto;
        }

        //Setters
        public function setidrespuesta($idrespuesta){
            $this->idrespuesta = $idrespuesta;
        }
        public function setidforoprincipal($idforoprincipal){
            $this->idforoprincipal = $idforoprincipal;
        }
        public function setiduserpublica($iduserpublica){
            $this->iduserpublica = $iduserpublica;
        }
        public function setiduserresponde($iduserresponde){
            $this->iduserresponde = $iduserresponde;
        }
        public function settexto($texto){
            $this->texto = $texto;
        }
    }
?>
