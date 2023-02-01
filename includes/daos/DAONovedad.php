<?php
//Clase encargada de actualizar la información del objeto NOVEDAD en la BBDD
require_once('includes/novedad.php');
require_once('includes/categoria.php');
require_once("includes/config.php");
//namespace includes;

class DAONovedad {
 
  public function getnovedad($id) {
    $db = getConexionBD();
    $sql = "SELECT * from novedades where identificador = '$id'";
    $res = mysqli_query($db, $sql);
    $fila = mysqli_fetch_assoc($res);
    
    $id=$fila['identificador'];
    $autor=$fila['autor'];
    $titulo=$fila['titulo'];
    $descripcion=$fila['descripcion'];
    $fecha=$fila['fecha'];
    $categorianovedades=$fila['categorianovedades'];
    return new Novedad($id, $autor, $descripcion, $fecha, $titulo, $categorianovedades);
  }

  public function getAllCategoriasNovedades(){
    $db = getConexionBD();
    $sql = "SELECT * from categorianovedades";
    $res = mysqli_query($db,$sql);
    $allCategorias = array();
    $i = 0;
    
    while($row = mysqli_fetch_assoc($res)) {
        $p = new Categoria();
        $p->setCategoria($row['nombrecategoria']);
        $allCategorias[$i] = $p;
        $i += 1;
    }
    return $allCategorias;
  }

  public function getAllNovedades() {
    $db = getConexionBD();
    $sql = "SELECT * from novedades ORDER BY fecha DESC";
    $res = mysqli_query($db,$sql);
    $allNovedades = array();
    $i = 0;
    
    while($row = mysqli_fetch_assoc($res)) {
        $id=$row['identificador'];
        $autor=$row['autor'];
        $titulo=$row['titulo'];
        $descripcion=$row['descripcion'];
        $fecha=$row['fecha'];
        $categorianovedades=$row['categorianovedades'];
        $p = new Novedad($id, $autor, $descripcion, $fecha, $titulo, $categorianovedades);
        $allNovedades[$i] = $p;
        $i += 1;
    }
    return $allNovedades;
  }

  public function getAllNovedadesCategoria($categoria) {
    $db = getConexionBD();
    $sql = "SELECT * from novedades WHERE categorianovedades='$categoria' ORDER BY fecha DESC";
    $res = mysqli_query($db,$sql);
    $allNovedades = array();
    $i = 0;
    
    while($row = mysqli_fetch_assoc($res)) {
        $id=$row['identificador'];
        $autor=$row['autor'];
        $titulo=$row['titulo'];
        $descripcion=$row['descripcion'];
        $fecha=$row['fecha'];
        $categorianovedades=$row['categorianovedades'];
        $p = new Novedad($id, $autor, $descripcion, $fecha, $titulo, $categorianovedades);
        $allNovedades[$i] = $p;
        $i += 1;
    }
    return $allNovedades;
  }


  public function insertaNovedad($autor,$titulo,$descripcion,$fecha,$categoria){
      $db = getConexionBD();
      $query = "INSERT INTO novedades (autor,titulo,descripcion,fecha,categorianovedades) VALUES ('$autor','$titulo','$descripcion','$fecha','$categoria')";
      $res=mysqli_query($db, $query);
      if($res){
        return true;
      }
      return false;
  }
  
  public function insertaCategoria($categoria){
    $db = getConexionBD();
    $categorias=$this->getAllCategoriasNovedades();
    if(!in_array($categoria, $categorias)){
      $query = "INSERT INTO categorianovedades (nombrecategoria) VALUES ('$categoria')";
      $res=mysqli_query($db, $query);
      if($res){
        return true;
      }
    }
    return false;
  }

  public function delete($id){
    $db = getConexionBD();
    $query="DELETE FROM novedades WHERE identificador='$id'";
    $res=mysqli_query($db, $query);
    if($res){
        return true;
    }
    return false;
  }

  public function update($id, $autor, $titulo, $descripcion, $fecha, $categoria){
    $db = getConexionBD();
    $query="UPDATE novedades SET autor='$autor', titulo='$titulo',fecha='$fecha',descripcion='$descripcion',categorianovedades='$categoria' where identificador='$id'";
    $res=mysqli_query($db, $query);
    if($res){
        return true;
    }
    return false;
  }

} 
?>

