<?php
    require('includes/pedido.php');
    require('includes/daos/DAOTour.php');
    require('includes/daos/DAOPedido.php');
    session_start();
	$pedidoDAO = new DAOPedido();
    $allPU = $pedidoDAO->getAllPedidosUser($_SESSION['email']);
    $daotour = new DAOTour();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Carrito</title>
</head>
<body>
    <div id="contenedor">
        <div id="cabecera">
            <?php
                require("includes/comun/cabecera.php");
            ?>
        </div>
        <div id="contenido">
        <?php
            $totalPrecio = 0;
            if(count($allPU) <= 0){
                echo "<h2>No hay productos añadidos al carrito</h2><br>";
                echo "¡Añade un <a href='tienda.php'><b>tour</b></a> al carrito para seguir con la compra!";
            }
            else{
                foreach($allPU as $pedido){    
                    $tour = $daotour->getTour($pedido->getidtour());
                    echo "<h2>" . $tour->getNombreTour()."</h2><br>";
                    echo "Plazas seleccionadas: <b>".$pedido->getplazas()."</b><br><br>";
                    echo "Fecha: <b>".$pedido->getfecha()."</b><br><br>";
                    echo "Precio: <b>".$pedido->getprecio()*$pedido->getplazas()."€</b><br><br>";
                    echo '<a href="procesarEliminarCarrito.php?pedido='.$pedido->getidPedido().'" ><button>Eliminar </b></button></a>';
                    $totalPrecio += intval($pedido->getprecio())*intval($pedido->getplazas());
                    echo "<br><br><hr><br>";
                }
                echo "<br><br><br>";
                echo "<h3>Precio total: ".$totalPrecio."€</h3><br>";
                echo "<a href='procesarCompra.php'><button>Comprar</button></a>";
            }
        ?>
        </div>
        <div id="pie">
            <?php
                require("includes/comun/pie.php");
            ?>
        </div>
    </div>
</body>
</html>