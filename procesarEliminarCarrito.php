<?php
    session_start();
    require('includes/daos/DAOPedido.php');
    $pedidoDAO = new DAOPedido();
    $ped = $_REQUEST['pedido'];
    
    $pedidoDAO->eliminar($ped);
?>
<meta http-equiv="refresh" content="0;URL=carrito.php">
   