<?php
require_once('includes/favoritos.php');
require_once("includes/config.php");
class DAOFavoritos {

    public function insertafavorito($idusuario,$idtour){
        $db = getConexionBD();

        $sql = "INSERT INTO favoritos (idusuario,idtour) VALUES 
            ('$idusuario','$idtour')";
        return mysqli_query($db,$sql);
    }

    public function yaenfavoritos($idusuario,$idtour){
        $db = getConexionBD();
        $sql = "SELECT * FROM favoritos WHERE idusuario = '$idusuario' AND idtour='$idtour'";
        $res = mysqli_query($db,$sql);
        if($res){
            if ( $res->num_rows == 1 > 0) {
                return true;
            }
            else{
                return false;
            }
        }
        else{
            echo "Error al consultar la BD";
        }
        return false;
    }

    public function deletefavorito($correo,$idtour){
        $db = getConexionBD();

        $sql ="DELETE FROM favoritos WHERE idusuario='$correo' AND idtour='$idtour'";
        return mysqli_query($db,$sql);
    }

    public function getallfavoritos($idusuario){
        $db = getConexionBD();
        $sql = "SELECT * from favoritos where idusuario = '$idusuario'";
        $res = mysqli_query($db,$sql);
        $allFavoritos = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            $id = $row['identificador'];
            $idusuario = $row['idusuario'];
            $idtour = $row['idtour'];
            $p = new Favorito();
            $p->setid($id);
            $p->setidusuario($idusuario);
            $p->setidtour($idtour);
            $allFavoritos[$i] = $p;
            $i += 1;
        }
        return $allFavoritos;
    }
}
?>