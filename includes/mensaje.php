<?php

class Mensaje{
    private $idMensaje;
    private $nombre;
    private $correo;
    private $fecha;
    private $contenido;
    private $asunto;

    public function __construct($idMensaje, $correo, $nombre, $fecha, $asunto, $contenido){
        $this->idMensaje=$idMensaje;
        $this->correo=$correo;
        $this->nombre=$nombre;
        $this->fecha=$fecha;
        $this->contenido=$contenido;
        $this->asunto=$asunto;
    }

    //Getters
    public function getIdMensaje(){
        return $this->idMensaje;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getContenido(){
        return $this->contenido;
    }
    
    public function getAsunto(){
        return $this->asunto;
    }
}

?>