<?php
require_once('includes/comentario.php');
require_once("includes/config.php");
//Clase encargada de actualizar la información de los comentarios en la BBDD
class DAOComentario {

    public function insert($idtour,$email,$fecha, $contenido){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $sql = "INSERT INTO comentarios (idtour,correousuario,fecha,contenido) VALUES ('$idtour','$email','$fecha', '$contenido')";
        return mysqli_query($db,$sql);
    }

    public function update($idcomentario,$idtour,$email,$fecha, $contenido){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $sql = "UPDATE comentarios SET idcomentario = '$idcomentario' ,idtour = '$idtour', correousuario='$email', fecha='$fecha', contenido='$contenido' where idcomentario='$idcomentario'";
        return mysqli_query($db,$sql);
    }

    public function delete($idcomentario){
        $db = getConexionBD();
        $sql="DELETE FROM comentarios WHERE idcomentario='$idcomentario'";
        return mysqli_query($db,$sql);
    }

    public function getAllComentariosPorTour($idtour){
        $db=getConexionBD();
        $sql="SELECT * FROM comentarios WHERE idtour='$idtour'";
        $res=mysqli_query($db, $sql);
        $arrayComentarios=array();
        if($res){
            if(mysqli_num_rows($res)>0){
                $i=0;
                while($row = mysqli_fetch_assoc($res)) {
                    
                    $nick=$row['correousuario'];
                    $idcomentario=$row['idcomentario'];
                    $fecha=$row['fecha'];
                    $idtour=$row['idtour'];
                    $contenido=$row['contenido'];
                    $p = new Comentario($idcomentario, $idtour, $nick, $fecha, $contenido);
                    $arrayComentarios[$i] = $p;
                    $i += 1;
                }
            }
        }
        return $arrayComentarios;
    }
}
?>