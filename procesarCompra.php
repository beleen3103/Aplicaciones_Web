<?php
    require('includes/pedido.php');
    require('includes/daos/DAOTour.php');
    require('includes/daos/DAOPedido.php');
    require('includes/daos/DAOCompra.php');
    session_start();
	$pedidoDAO = new DAOPedido();
    $daotour = new DAOTour();
    $compraDAO = new DAOCompra();
    $allPU = $pedidoDAO->getAllPedidosUser($_SESSION['email']);

    foreach($allPU as $pedido){
        //Insertar pedido en la tabla de compras
        $compraDAO->insertacompra($_SESSION['email'],$pedido->getfecha(),$pedido->getprecio(),$pedido->getplazas(),$pedido->getidTour());
        //Actualizando número de plazas
        $daotour->updatePlazas($pedido->getidTour(), $pedido->getPlazas());
        $pedidoDAO->eliminar($pedido->getidPedido());
    }
?>
<script>
    alert('Compra realizada');
    window.location.href='carrito.php';
</script>

                