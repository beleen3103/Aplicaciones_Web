<?php
    session_start();
    require('includes/daos/DAOTour.php');
    $nombre = htmlspecialchars(trim(strip_tags($_REQUEST['newName'])));
    $precio = htmlspecialchars(trim(strip_tags($_REQUEST['newPrice'])));
    $numplazas = htmlspecialchars(trim(strip_tags($_REQUEST['newNumSeats'])));
    $categoria = htmlspecialchars(trim(strip_tags($_REQUEST['newCategoria'])));
    $desc = htmlspecialchars(trim(strip_tags($_REQUEST['newDesc'])));
    $actualizado=(new DAOTour())->update($nombre, $precio, $_GET['idtour'], $numplazas, $desc, $categoria,'');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Actualización del nuevo tour</title>
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
            if(!$actualizado)
                echo '¡Error! El tour no se ha actualizado correctamente';
            else
                echo 'El tour ha sido actualizado correctamente';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>