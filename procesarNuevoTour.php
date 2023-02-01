<?php
    session_start();
    //require('includes/tour.php');
    require('includes/daos/DAOTour.php');

    $nombre = htmlspecialchars(trim(strip_tags($_REQUEST['nameTour'])));
    $precio = htmlspecialchars(trim(strip_tags($_REQUEST['priceTour'])));
    $numplazas = htmlspecialchars(trim(strip_tags($_REQUEST['numSeats'])));
    $categoria = htmlspecialchars(trim(strip_tags($_REQUEST['categoria'])));
    $desc = htmlspecialchars(trim(strip_tags($_REQUEST['desc'])));
    $tourDAO = new DAOTour();
    // cuando toque, cambiar la urltour
    $insertado=$tourDAO->inserta($nombre, $precio, $numplazas, $desc, $categoria, '');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Añadir nuevo tour</title>
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
            if(!$insertado){
                echo'Error al añadir el tour';
            }
            else{
                echo'El tour se ha añadido correctamente';
            }
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>