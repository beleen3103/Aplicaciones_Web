<?php 
require_once('includes/mensajerespuesta.php');
require_once("includes/config.php");

class DAOForoRespuesta {
    public function insertamensajerespuesta($idfororespuesta,$iduserpublica,$iduserresponde,$texto){
        $db = getConexionBD();

        $sql = "INSERT INTO fororespuesta (idforoprincipal,iduserpublica,iduserresponde,
        texto) VALUES 
            ('$idfororespuesta','$iduserpublica','$iduserresponde','$texto')";
        return mysqli_query($db,$sql);
    }

    public function insertamensajerespuestaG($idfororespuesta,$iduserpublica,$texto){
        $db = getConexionBD();

        $sql = "INSERT INTO fororespuesta (idforoprincipal,iduserpublica,iduserresponde,
        texto) VALUES 
            ('$idfororespuesta','$iduserpublica',NULL,'$texto')";
        return mysqli_query($db,$sql);
    }

    public function deletemensajerespuesta($idrespuesta){
        $db = getConexionBD();

        $sql ="DELETE FROM foroprincipal WHERE idrespuesta='$idrespuesta'";
        return mysqli_query($db,$sql);
    }

    public function getAllRespuestasPorForo($idforoprincipal){
        $db=getConexionBD();
        $sql="SELECT * FROM fororespuesta WHERE idforoprincipal='$idforoprincipal'";
        $res=mysqli_query($db, $sql);
        $arrayRespuestas=array();
        if($res){
            if(mysqli_num_rows($res)>0){
                $i=0;
                while($row = mysqli_fetch_assoc($res)) {
                    
                    $idrespuesta=$row['idrespuesta'];
                    $iduserpublica=$row['iduserpublica'];
                    $iduserresponde=$row['iduserresponde'];
                    $texto=$row['texto'];
                    $p = new MensajeRespuesta();
                    $p->setidrespuesta($idrespuesta);
                    $p->setidforoprincipal($idforoprincipal);
                    $p->setiduserpublica($iduserpublica);
                    $p->setiduserresponde($iduserresponde);
                    $p->settexto($texto);
                    $arrayRespuestas[$i] = $p;
                    $i += 1;
                }
            }
        }
        return $arrayRespuestas;
    }
}
?>