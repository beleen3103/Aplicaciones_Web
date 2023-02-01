<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    $usuarioDAO = new DAOUsuario();
   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Editar contraseña</title>
</head>

<body>
<div id="contenedor">

	<div id="cabecera">
		<?php
			require('includes/comun/cabecera.php');
		?>
	</div>
    <?php
    if($_SESSION['login']){
        $usuario = $usuarioDAO->getUsuarioE($_SESSION["email"]);
    }
    ?>
	<div id="contenido">
    <div class="formulario-editar-perfil">
        <form action='procesareditarcontrasenia.php' method='POST'>
            <h2 class="form-name">Editar contraseña</h2>
            <fieldset>
                <p>Email: </p><?php echo $usuario->getcorreo()?> <br><br> 
                <p>Nueva contraseña: </p><input type='text' name='password_r'value=" "> <br><br>
                <p>Repite Contraseña: </p><input type='text' name='passwordrep_r'value=" "> <br><br>
                </br>
                <button type="submit" class="form-button">Editar</button>
            </fieldset>
        </form>
    </div>
    
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>