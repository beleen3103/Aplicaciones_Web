<?php
    session_start();
    //require('includes/tour.php');
    require('includes/daos/DAONovedad.php');
 
    $autor = htmlspecialchars(trim(strip_tags($_REQUEST['autor'])));
    $titulo = htmlspecialchars(trim(strip_tags($_REQUEST['titulo'])));
    $categoria = htmlspecialchars(trim(strip_tags($_REQUEST['novedad'])));
    $desc = htmlspecialchars(trim(strip_tags($_REQUEST['desc'])));
    $fecha=date('Y-m-d'); //h:m:s
    $novedadDAO = new DAONovedad();
    // cuando toque, cambiar la urltour
    $insertado=$novedadDAO->insertaNovedad($autor, $titulo, $desc, $fecha, $categoria, '');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Añadir nuevo novedad</title>
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
                echo'Error al añadir la novedad';
            }
            else{
                echo'La novedad se ha añadido correctamente';
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