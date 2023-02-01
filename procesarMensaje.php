<?php
    session_start();
    require_once('includes/daos/DAOMensaje.php');
    $nombreUsuario;
    if(isset($_REQUEST['nombre']))
        $nombreUsuario = htmlspecialchars(trim(strip_tags($_REQUEST['nombre'])));
    else
        $nombreUsuario = htmlspecialchars(trim(strip_tags($_SESSION['nick'])));
    
    $correo;
    if(isset($_REQUEST['email']))
        $correo = htmlspecialchars(trim(strip_tags($_REQUEST['email'])));
    else
        $correo = htmlspecialchars(trim(strip_tags($_SESSION['email'])));
    
    $fecha = date('Y-m-d');
    $contenido = htmlspecialchars(trim(strip_tags($_REQUEST['contenido'])));
    $asunto = htmlspecialchars(trim(strip_tags($_REQUEST['asunto'])));
    $insertado=(new DAOMensaje())->insert($correo, $nombreUsuario, $fecha, $asunto, $contenido);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Actualización del nuevo mensaje</title>
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
            if(!$insertado)
                echo '¡Error! El mensaje no se ha enviado correctamente';
            else
                echo 'El mensaje se ha enviado correctamente al equipo gestor de la aplicación';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>