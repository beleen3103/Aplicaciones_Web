<?php
require_once('includes/valoracion.php');
require_once("includes/config.php");
require_once("includes/tour.php");
class DAOValoracion {

    public function insertavaloracion($idusuario,$idtour,$valoracion){
        $db = getConexionBD();

        $sql = "INSERT INTO valoracion (idusuario,idtour,valoracion) VALUES 
            ('$idusuario','$idtour','$valoracion')";
        return mysqli_query($db,$sql);
    }

    public function yavalorado($idusuario,$idtour){
        $db = getConexionBD();
        $sql = "SELECT * FROM valoracion WHERE idusuario = '$idusuario' AND idtour='$idtour'";
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

    public function getvaloracion($idusuario,$idtour){
        $db = getConexionBD();
        $sql = "SELECT valoracion 
                FROM valoracion WHERE idusuario = '$idusuario' and idtour='$idtour'";
        $rs = mysqli_query($db,$sql);
        $p=NULL;
        if($rs){
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $p=$fila['valoracion'];
            }
        }
        else{
            echo "Error al consultar la BD";
            //return false;
        }
        return $p;
    }

    public function deletevaloracion($idusuario,$idtour){
        $db = getConexionBD();

        $sql ="DELETE FROM valoracion WHERE idusuario='$idusuario' AND idtour='$idtour'";
        return mysqli_query($db,$sql);
    }

    public function updatevaloracion($idusuario,$idtour,$valoracion){
        $db = getConexionBD();

        $sql ="UPDATE valoracion set valoracion= '$valoracion' where idusuario='$idusuario' AND idtour='$idtour'";
        return mysqli_query($db,$sql);
    }

    public function getallvaloraciones($idtour){
        $db = getConexionBD();
        $sql = "SELECT * from valoracion where idtour='$idtour'";
        $res = mysqli_query($db,$sql);
        $allValoraciones = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            $id = $row['idvaloracion'];
            $idusuario = $row['idusuario'];
            $idtour = $row['idtour'];
            $valoracion = $row['valoracion'];
            $p = new Valoracion();
            $p->setidvaloracion($id);
            $p->setidusuario($idusuario);
            $p->setidtour($idtour);
            $p->setvaloracion($valoracion);
            $allValoraciones[$i] = $p;
            $i += 1;
        }
        return $allValoraciones;
    }

    public function getMostRankedTours(){
        $db = getConexionBD();
        $mostRankedTours=array();
        $i=0;
        $sql1 = "SELECT DISTINCT idtour, AVG(valoracion) as total_valoraciones FROM valoracion GROUP BY idtour ORDER BY total_valoraciones DESC";
        $res1 = mysqli_query($db,$sql1);
        while(($row = mysqli_fetch_assoc($res1))&&$i<3) {
            $idtour=$row['idtour'];
            $sql2="SELECT nombretour FROM tiendatours WHERE numreferencia='$idtour'";
            $res2=mysqli_query($db, $sql2);
            $row1=mysqli_fetch_assoc($res2);
            $p=array("id"=>$row['idtour'], "nombre"=>$row1['nombretour'], 'total_points'=>$row['total_valoraciones']);
            $mostRankedTours[$i] = $p;
            $i += 1;
        }
        
        return $mostRankedTours;        
    }
}
?>