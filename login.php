<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Login</title>
</head>
<body>
<div id="contenedor">

<div id="cabecera">
    <?php
        require('includes/comun/cabecera.php');
    ?>
</div>
<div id="contenido">
    <div class="formulario-login">
        <form action='procesarLogin.php' method='POST'>
            <h2 class="form-name">Login</h2>
            <fieldset>
                <p>Email: </p><input type='email' name='email'> <br><br>
                <p>Contraseña: </p><input type='password' name='password'> <br> 
                <br><br><br>
                <button type="submit" class="form-button">Enviar</button>
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