<?php

class Comentario{
    private $idComentario;
    private $idTour;
    private $nickUsuario;
    private $fecha;
    private $contenido;

    public function __construct($idComentario, $idTour, $nickUsuario, $fecha, $contenido){
        $this->idComentario=$idComentario;
        $this->idTour=$idTour;
        $this->nickUsuario=$nickUsuario;
        $this->fecha=$fecha;
        $this->contenido=$contenido;
    }

    //Getters
    public function getIdComentario(){
        return $this->idComentario;
    }

    public function getIdTour(){
        return $this->idTour;
    }

    public function getNickUsuario(){
        return $this->nickUsuario;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getContenido(){
        return $this->contenido;
    }
}

?>