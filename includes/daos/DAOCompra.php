<?php
//Clase encargada de actualizar la información del objeto compra en la BBDD
require_once('includes/compra.php');
require_once("includes/config.php");

class DAOCompra {
    
    public function getcompra($id) {
        $db = getConexionBD();
        $sql = "SELECT * from compra where idcompra = '$id'";
        $res = mysqli_query($db, $sql);
        $fila = mysqli_fetch_assoc($res);

        $p = new Compra();
        $p->setidcompra($fila['idcompra']);
        $p->setidCorreo($fila['idcorreo']);
        $p->setPrecio($fila['precio']);
        $p->setFecha($fila['fecha']);
        $p->setPlazas($fila['plazas']);
        $p->setidTour($fila['idtour']);
        return $p;
    }

    public function getAllcompras() {
        $db = getConexionBD();
        $sql = "SELECT * from compra";
        $res = mysqli_query($db,$sql);
        $allcompras = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($res)) {
            $p = new Compra();
            $p->setidcompra($row['idcompra']);
            $p->setidCorreo($row['idcorreo']);
            $p->setFecha($row['fecha']);
            $p->setPrecio($row['precio']);
            $p->setPlazas($row['plazas']);
            $p->setidTour($row['idtour']);	
            $allcompra[$i] = $p;
            $i += 1;
        }
    return $allcompras;
    }

    public function getAllComprasUser($idcorreo) {
        $db = getConexionBD();
        $sql = "SELECT * from compras where idcorreo = '$idcorreo'";
        $res = mysqli_query($db,$sql);

        $allcompras = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            
            $p = new Compra();
            $p->setidcompra($row['idcompra']);
            $p->setidCorreo($row['idcorreo']);
            $p->setFecha($row['fecha']);
            $p->setPrecio($row['precio']);
            $p->setPlazas($row['plazas']);
                $p->setidTour($row['idtour']);	
            $allcompras[$i] = $p;
            $i += 1;
        }

        return $allcompras;
    }


    public function insertacompra($idcorreo,$fecha,$precio,$plazas,$idtour){
        $db = getConexionBD(); 
        $sql = "INSERT INTO compras (idcorreo,fecha,precio,plazas,idtour) VALUES ('$idcorreo','$fecha','$precio','$plazas','$idtour')";
        $res = mysqli_query($db,$sql);
        if ( false===$res) {
            printf("error: %s\n", mysqli_error($db));
        }
        else {
            echo 'done.';
        }
        return $res;
    }

} 
?>
