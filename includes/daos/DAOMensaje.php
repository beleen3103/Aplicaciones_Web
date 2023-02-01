<?php
require_once('includes/mensaje.php');
require_once("includes/config.php");
//Clase encargada de actualizar la información de los mensajes que 
//se envian entre al formulario de contacto en la base de datos
class DAOMensaje {

    public function insert($correo,$nombre,$fecha, $asunto, $contenido){
        $db = getConexionBD();
        $sql = "INSERT INTO mensajes (correo,nombre,fecha,asunto,contenido) VALUES ('$correo','$nombre','$fecha', '$asunto','$contenido')";
        return mysqli_query($db,$sql);
    }

    public function delete($idmensaje){
        $db = getConexionBD();
        $sql="DELETE FROM mensajes WHERE idmensaje='$idmensaje'";
        return mysqli_query($db,$sql);
    }

    public function getAllMensajes(){
        $db=getConexionBD();
        $sql="SELECT * FROM mensajes ORDER BY fecha DESC";
        $res=mysqli_query($db, $sql);
        $arrayMensajes=array();
        if($res){
            if(mysqli_num_rows($res)>0){
                $i=0;
                while($row = mysqli_fetch_assoc($res)) {
                    $nombre=$row['nombre'];
                    $idmensaje=$row['idmensaje'];
                    $fecha=$row['fecha'];
                    $correo=$row['correo'];
                    $contenido=$row['contenido'];
                    $asunto=$row['asunto'];
                    $mensaje = new Mensaje($idmensaje, $correo, $nombre, $fecha, $asunto, $contenido);
                    $arrayMensajes[$i] = $mensaje;
                    $i += 1;
                }
            }
        }
        return $arrayMensajes;
    }
}
?>