<?php
    session_start();
    require('includes/daos/DAONovedad.php');
    $titulo = htmlspecialchars(trim(strip_tags($_REQUEST['newTitulo'])));
    $categoria = htmlspecialchars(trim(strip_tags($_REQUEST['newCategoria'])));
    $contenido = htmlspecialchars(trim(strip_tags($_REQUEST['newDesc'])));
    $fecha=date('Y-m-d');
    $autor=htmlspecialchars(trim(strip_tags($_REQUEST['newAutor'])));
    $actualizado=(new DAONovedad())->update($_GET['idnovedad'], $autor, $titulo, $contenido, $fecha, $categoria, '');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Actualización de la novedad</title>
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
                echo '¡Error! La novedad no se ha actualizado correctamente';
            else
                echo 'La novedad ha sido actualizado correctamente';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>