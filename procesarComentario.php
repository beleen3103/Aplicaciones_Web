<?php
    session_start();
    require_once('includes/daos/DAOComentario.php');
    $idtour = $_GET['idtour'];
    $correo = htmlspecialchars(trim(strip_tags($_SESSION['email'])));
    $fecha = date('Y-m-d');
    $contenido = htmlspecialchars(trim(strip_tags($_REQUEST['contenido'])));
    $actualizado=(new DAOComentario())->insert($idtour, $correo, $fecha, $contenido);
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
                echo '¡Error! El comentario no se ha añadido correctamente';
            else
                echo 'El comentario se ha añadido correctamente';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>