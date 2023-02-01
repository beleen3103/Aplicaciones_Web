<?php
    class Categoria {
        private $categoria = "";
        private $url = "";

        //Getters
        public function getCategoria(){
            return $this->categoria;
        }
        public function getUrl(){
            return $this->url;
        }

        //Setters
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
        public function setUrl($url){
            $this->url = $url;
        }

    }
?>
