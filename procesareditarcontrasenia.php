<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    $email=$_SESSION['email'];
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password_r"])));
    $password_r = htmlspecialchars(trim(strip_tags($_REQUEST["passwordrep_r"])));
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
            if($password==$password_r){
                if(!$usuarioDAO->updatecontrasenia($email, $password_r)){
                    echo '<h1>No se ha podido actualizar con éxito.</h1>';
                }
                else{
                    $_SESSION["password"]=$password;
                    echo '<h1>Usuario actulizado correctamente.</h1>';
                }
            }
            else{
                echo '<h1>Las contraseñas no son iguales. Prueba otra vez.</h1>';
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