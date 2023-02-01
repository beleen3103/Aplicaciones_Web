<?php
require_once("includes/tour.php");
require_once("includes/categoria.php");
require_once("includes/config.php");

class DAOTour {

    public function inserta($nombreTour, $precio, $numeroplazas, $descripcion, $categoriatour, $urltour) {
        $db = getConexionBD();
        $query="INSERT into tiendatours (nombretour,precio,numeroplazas,descripcion,categoriatour,urltour) values ('$nombreTour','$precio','$numeroplazas','$descripcion','$categoriatour','img/tours/asylum.jpg')";
        $res=mysqli_query($db, $query);
        if($res){
            return true;
        }
        return false;
    }

    public function insertaCategoria($categoria){
        $db = getConexionBD();
        $categorias=$this->getAllCategorias();
        if(!in_array($categoria, $categorias)){
            $query = "INSERT INTO categoriatour (nombrecategoria,urlcct) VALUES ('$categoria', 'img/categorias/deporte.jpg')";
            $res=mysqli_query($db, $query);
            if($res){
            return true;
            }
        }
        return false;
    }
        
    public function update($nombreTour, $precio, $numreferencia, $numeroplazas, $descripcion, $categoriatour) {
        $db = getConexionBD();
        $query="UPDATE tiendatours SET nombretour='$nombreTour',precio='$precio',numeroplazas='$numeroplazas',descripcion='$descripcion',categoriatour='$categoriatour' where numreferencia='$numreferencia'";
        $res=mysqli_query($db, $query);
        if($res){
            return true;
        }
        return false;
    }

    public function updateurl($numref,$url){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $sql = "UPDATE tiendatours set urltour = '$url' where numreferencia = '$numref'";
        return mysqli_query($db,$sql);
    }

    public function updatePlazas($numreferencia, $numeroplazas) {
        $db = getConexionBD();
        $tour = $this->getTour($numreferencia);
        $plazas = $tour->getNumeroPlazas();

        $plazas = $plazas - $numeroplazas;


        $query="UPDATE tiendatours SET numeroplazas='$plazas' where numreferencia='$numreferencia'";
        $res=mysqli_query($db, $query);
        if($res){
            return true;
        }
        return false;
    }

    public function delete($referencia) {
        $db = getConexionBD();
        $query="DELETE FROM tiendatours WHERE numreferencia='$referencia'";
        $res=mysqli_query($db, $query);
        if($res){
            return true;
        }
        return false;
    }

    public function getTour($numreferencia) {
        $db = getConexionBD();
        $sql = "SELECT * from tiendatours where numreferencia = '$numreferencia'";
        $res = mysqli_query($db,$sql);
        $fila = mysqli_fetch_assoc($res);
        
        $nombre = $fila['nombretour'];
        $precio = $fila['precio'];
        $numreferencia = $fila['numreferencia'];
        $numplazas = $fila['numeroplazas'];
        $categoria = $fila['categoriatour'];
        $desc = $fila['descripcion'];
        $urltour=$fila['urltour'];
        return new Tour($nombre, $precio, $numreferencia, $numplazas, $categoria, $desc, $urltour);
    }

    public function getAllTours() {
        $db = getConexionBD();
        $sql = "SELECT * from tiendatours";
        $res = mysqli_query($db,$sql);
        $allTours = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            $nombre = $row['nombretour'];
            $precio = $row['precio'];
            $numreferencia = $row['numreferencia'];
            $numplazas = $row['numeroplazas'];
            $categoria = $row['categoriatour'];
            $desc = $row['descripcion'];
            $urltour=$row['urltour'];
            $p = new Tour($nombre, $precio, $numreferencia, $numplazas, $categoria, $desc, $urltour);
            $allTours[$i] = $p;
            $i += 1;
        }
        return $allTours;
    }

    public function getAllCategorias() {
        $db = getConexionBD();
        $sql = "SELECT * from categoriatour";
        $res = mysqli_query($db,$sql);
        $allCategorias = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            $p = new Categoria();
            $p->setCategoria($row['nombrecategoria']);
            $p->setUrl($row['urlcct']);
            $allCategorias[$i] = $p;
            $i += 1;
        }
        return $allCategorias;
    }

    public function getCategoria($categoria) {
        $db = getConexionBD();
        $sql = "SELECT * from categoriatour WHERE nombrecategoria = '$categoria'";
        $res = mysqli_query($db,$sql);
        $fila = mysqli_fetch_assoc($res);
        $p = new Categoria();
        $p->setCategoria($fila['nombrecategoria']);
        $p->setUrl($fila['urlcct']);
        return $p;
    }

    public function getTourPorCategoria($categoria) {
        $db = getConexionBD();
        $sql = "SELECT * from tiendatours WHERE categoriatour = '$categoria'";
        $res = mysqli_query($db,$sql);
        $allTours = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            $nombre = $row['nombretour'];
            $precio = $row['precio'];
            $numreferencia = $row['numreferencia'];
            $numplazas = $row['numeroplazas'];
            $categoria = $row['categoriatour'];
            $desc = $row['descripcion'];
            $urltour=$row['urltour'];
            $p = new Tour($nombre, $precio, $numreferencia, $numplazas, $categoria, $desc, $urltour);
            $allTours[$i] = $p;
            $i += 1;
        }
        return $allTours;
    }

    public function getRecomendados($idtour){
        $db = getConexionBD();
        $sql = "SELECT idcorreo from compras WHERE idtour = '$idtour'";
        $res = mysqli_query($db,$sql);
        $recomendados=array();
        $i=0;
        $j=0;
        if($res){
            while($i<2 && $row = mysqli_fetch_assoc($res)){
                $correo=$row['idcorreo'];
                $sql2="SELECT idtour FROM compras WHERE idcorreo = '$correo' AND idtour !='$idtour'";
                $res2 = mysqli_query($db,$sql2);
                if($res2){
                    while($j<2 && $row2 = mysqli_fetch_assoc($res2)){
                        $idtour2=$row2['idtour'];
                        $sql3="SELECT * FROM tiendatours WHERE numreferencia = '$idtour2'";
                        $res3 = mysqli_query($db,$sql3);
                        $row3 = mysqli_fetch_assoc($res3);
                        $nombretour=$row3['nombretour'];
                        $precio=$row3['precio'];
                        $id=$row3['numreferencia'];
                        $numeroplazas=$row3['numeroplazas'];
                        $descripcion=$row3['descripcion'];
                        $categoriatour=$row3['categoriatour'];
                        $urltour=$row3['urltour'];
                        $tour=new Tour($nombretour,$precio,$id,$numeroplazas,$categoriatour,$descripcion,$urltour);
                        $recomendados[$j]=$tour;
                        $j++;
                    }
                }
                $i++;
            }
        }
        return $recomendados;
    }

}
?>