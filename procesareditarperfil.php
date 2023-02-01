<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    $email=$_SESSION['email'];
    $nombreusuario = htmlspecialchars(trim(strip_tags($_REQUEST["nombreusuario_r"])));
    $nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick_r"])));
    $telefono = htmlspecialchars(trim(strip_tags($_REQUEST["telefono_r"])));
    $direccion = htmlspecialchars(trim(strip_tags($_REQUEST["direccion_r"])));
    $usuarioDAO = new DAOUsuario();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Procesar edición de perfil</title>
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
            if(!$usuarioDAO->update($email, $nombreusuario,$nick, $telefono, $direccion)){
                echo '<h1>No se ha podido editar con éxito.</h1>';
            }
            else{
                echo '<h1>Usuario editado correctamente.</h1>';
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