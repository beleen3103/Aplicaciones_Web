<?php
//Clase encargada de actualizar la información del objeto PEDIDO en la BBDD
require_once('includes/pedido.php');
require_once("includes/config.php");

class DAOPedido {
 
public function getpedido($id) {
  $db = getConexionBD();
  $sql = "SELECT * from pedido where idpedido = '$id'";
  $res = mysqli_query($db, $sql);
  $fila = mysqli_fetch_assoc($res);
  
  $p = new Pedido();
  $p->setidPedido($fila['idpedido']);
  $p->setidCorreo($fila['idcorreo']);
  $p->setPrecio($fila['precio']);
  $p->setFecha($fila['fecha']);
  $p->setPlazas($fila['plazas']);
  $p->setidTour($fila['idtour']);
  return $p;
 }

 public function getAllPedidos() {
  $db = getConexionBD();
  $sql = "SELECT * from pedido";
  $res = mysqli_query($db,$sql);
  $allPedidos = array();
  $i = 0;
  
  while($row = mysqli_fetch_assoc($res)) {
      $p = new Pedido();
      $p->setidPedido($row['idpedido']);
      $p->setidCorreo($row['idcorreo']);
      $p->setFecha($row['fecha']);
      $p->setPrecio($row['precio']);
      $p->setPlazas($row['plazas']);
	    $p->setidTour($row['idtour']);	
      $allPedido[$i] = $p;
      $i += 1;
  }
  return $allPedidos;
}

public function getAllPedidosUser($idcorreo) {
  $db = getConexionBD();
  $sql = "SELECT * from pedido where idcorreo = '$idcorreo'";
  $res = mysqli_query($db,$sql);
  $allPedidos = array();
  $i = 0;
  
  while($row = mysqli_fetch_assoc($res)) {
    
      $p = new Pedido();
      $p->setidPedido($row['idpedido']);
      $p->setidCorreo($row['idcorreo']);
      $p->setFecha($row['fecha']);
      $p->setPrecio($row['precio']);
      $p->setPlazas($row['plazas']);
	    $p->setidTour($row['idtour']);	
      $allPedidos[$i] = $p;
      $i += 1;
  }

  return $allPedidos;
}


public function insertaPedido($idcorreo,$fecha,$precio,$plazas,$idtour){
 
  $db = getConexionBD(); 
  $sql = "INSERT INTO pedido (idcorreo,fecha,precio,plazas,idtour) VALUES ('$idcorreo','$fecha','$precio','$plazas','$idtour')";
  return mysqli_query($db,$sql);
  
 
}

public function update($plazas, $idpedido){
  $db = getConexionBD();
  $sql = "UPDATE pedido set plazas = '$plazas' where idpedido = '$idpedido'";
  return mysqli_query($db,$sql);
}

public function eliminar($id){
  $db = getConexionBD();
  $query="DELETE FROM pedido WHERE idpedido='$id'";
  return mysqli_query($db, $query);
}

} 
?>
