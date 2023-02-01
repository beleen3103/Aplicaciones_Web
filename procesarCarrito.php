<?php
    require('includes/daos/DAOTour.php');
    require('includes/daos/DAOPedido.php');
    session_start();
    $tourDAO = new DAOTour();
	$tour = $tourDAO->getTour($_GET["idtour"]);
	$pedidoDAO = new DAOPedido();
    $allPedidos = $pedidoDAO->getAllPedidosUser($_SESSION["email"]);
    $cantidad = $_GET["cantidad"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Tour</title>
</head>
<body>
<div id="contenedor">

    <div id="cabecera">
        <?php
            require('includes/comun/cabecera.php');
        ?>
    </div>

    <div id="contenido">
        <?php
            if(isset($_SESSION["email"])){
                if(!isset($_GET["idtour"])){
                    echo "<h2>No se han encontrado Tours con esta categoría " .$_GET['idtour']. "</h2><br>";
                }
                else{
                    $i = 0;
                    $found = False;
                    while ($i<count($allPedidos) && !$found){
                        if($_GET["idtour"] == $allPedidos[$i]->getidTour())
                        {
                            $found = True;
                        }
                        $i++;
                    }
                    
                    if($found){
                        //ACTUALIZAR LISTA PEDIDOS
                        $i--;
			            $nPlaza = $allPedidos[$i]->getPlazas();
			            $nPlaza = $cantidad + $nPlaza;
                        $allPedidos[$i]->setPlazas($nPlaza);
                        if($allPedidos[$i]->getPlazas() > $tour->getNumeroPlazas()){
                            $allPedidos[$i]->setPlazas($tour->getNumeroPlazas());
                            echo "<h2>No hay plazas suficientes</h2><br><br>";
                        }
                        else
                        {
                            echo "<h2>Se ha actualizado el pedido al carrito correctamente</h2><br><br>";
                            echo "<b>" . $tour->getNombreTour() . "</b><br><br>";
                            echo "Precio: <b>" . $allPedidos[$i]->getPrecio() . "€</b><br><br>";
                            echo "Cantidad seleccionada: <b>" . $allPedidos[$i]->getPlazas() . "</b><br><br><br><br>";
                            echo "Precio TOTAL: <b>" . $allPedidos[$i]->getPlazas()*$tour->getPrecio() . "€</b><br><br>";
    
                            $pedidoDAO->update($nPlaza, $allPedidos[$i]->getidPedido());
                        }
                    }
                    else{
                        echo "<h2>Se ha añadido el pedido al carrito correctamente</h2><br><br>";
                        echo "<b>" . $tour->getNombreTour() . "</b><br><br>";
                        echo "Precio: <b>" . $tour->getPrecio() . "€</b><br><br>";
                        echo "Cantidad seleccionada: <b>" . $cantidad . "</b><br><br><br><br>";
                        echo "Precio TOTAL: <b>" . $cantidad*$tour->getPrecio() . "€</b><br><br>";
                        $pedidoDAO->insertaPedido($_SESSION["email"],date('Y-m-d'),$tour->getPrecio(),$cantidad, $tour->getNumReferencia());                     
             
                    }
                }
                echo "<a href='carrito.php'><button>Ir al carrito</button></a>";
            }
            else{
                echo "<h3>No tienes permisos para añadir un tour al carrito sin iniciar sesión</h3><br>";
                echo "<p>Puedes <a href='login.php'><b>iniciar sesión</b></a> o <a href='registro.php'><b>registrarte</b></a> para acceder al contenido completo de la web.</p>";
            }

            
        ?>

    </div>

    <div id="pie">
        <?php
            require('includes/comun/pie.php');
        ?>
    </div>
</div>
</body>
</html>