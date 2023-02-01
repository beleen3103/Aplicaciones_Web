<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email_r"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password_r"])));
    $password_r = htmlspecialchars(trim(strip_tags($_REQUEST["passwordrep_r"])));
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
    <title>Registro</title>
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
            if(!$usuarioDAO->contraseniasCoinciden($password,$password_r) ){
                echo '<p>Las contraseñas introducidas no coinciden.</p>';
                echo '<p>No se ha podido registrar con éxito.</p>';
            }
            else{
                $s = $usuarioDAO->insertaUsuario($email, $password, $nombreusuario,$nick,$telefono, $direccion,'img/usuarios/default.jpg');
                if(!$s){
                    echo '<p>No se ha podido registrar con éxito.</p>';
                    echo '<p>Usuario ya existente</p>';
                    echo '<p>Prueba con otro correo</p>';
                    $s=null;
                }
                else{
                    echo '<p>Usuario registrado correctamente.</p>';
                }
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