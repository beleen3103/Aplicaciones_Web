<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
    $usuarioDAO = new DAOUsuario();
    $p = $usuarioDAO->getUsuario($email, $password);
    if($p->getcorreo() != NULL){
        $_SESSION["login"] = true;
        $_SESSION["nick"] = $p->getnick();
        $_SESSION["password"] = $p->getcontrasenia();
        $_SESSION["email"] = $p->getcorreo();
    }
    else{
        $_SESSION["login"] = false;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Proceso Login</title>
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
            if ($_SESSION["login"]==false) { //Usuario incorrecto
        ?>
                <h1>ERROR</h1>
                <p>El usuario o contraseña no son válidos o no te has registrado previamente.</p>
                <p>Regístrate <a href="registro.php"><b>aquí</b></a> si aún no tienes una cuenta.</p>
        <?php
            }
            else { //Usuario registrado
                echo "<h1>Bienvenido {$p->getnick()}</h1>";
                echo "<p>Tu rol de registro es: <b>{$p->getrol()}</b></p>";
                echo "<p>Usa el menú para navegar.</p>";
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