<?php 
require_once('includes/mensajeprincipal.php');
require_once("includes/config.php");

class DAOForoMensajePrincipal {
    public function insertamensajeprincipal($idusuario,$titulo,$texto){
        $db = getConexionBD();

        $sql = "INSERT INTO foroprincipal (idusuario,titulo,texto) VALUES 
            ('$idusuario','$titulo','$texto')";
        return mysqli_query($db,$sql);
    }

    public function deletemensajeprincipal($idforo){
        $db = getConexionBD();

        $sql ="DELETE FROM foroprincipal WHERE idforo='$idforo'";
        return mysqli_query($db,$sql);
    }

    public function getAllForo(){
        $db=getConexionBD();
        $sql="SELECT * FROM foroprincipal";
        $res=mysqli_query($db, $sql);
        $arrayForo=array();
        if($res){
            if(mysqli_num_rows($res)>0){
                $i=0;
                while($row = mysqli_fetch_assoc($res)) {
                    
                    $idforo=$row['idforo'];
                    $idusuario=$row['idusuario'];
                    $titulo=$row['titulo'];
                    $texto=$row['texto'];
                    $p = new MensajePrincipal();
                    $p->setidforo($idforo);
                    $p->setidusuario($idusuario);
                    $p->settitulo($titulo);
                    $p->settexto($texto);
                    $arrayForo[$i] = $p;
                    $i += 1;
                }
            }
        }
        return $arrayForo;
    }

    public function getForo($idforo){
        $db=getConexionBD();
        $sql="SELECT * FROM foroprincipal WHERE idforo=$idforo";
        $res = mysqli_query($db,$sql);
        $fila = mysqli_fetch_assoc($res);
        $idforo=$fila['idforo'];
        $idusuario=$fila['idusuario'];
        $titulo=$fila['titulo'];
        $texto=$fila['texto'];
        $p = new MensajePrincipal();
        $p->setidforo($idforo);
        $p->setidusuario($idusuario);
        $p->settitulo($titulo);
        $p->settexto($texto);


        return $p;
    }
}
?>