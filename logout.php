<?php
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["rol"]);
    session_destroy();
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
    <?php
        if(!isset($_SESSION['login']) || !$_SESSION['login'])
            echo'Se ha cerrado la sesión.';
        else
            echo'Error al cerrar sesión.';
    ?>
</div>
<div id="pie">
    <?php
        require('includes/comun/pie.php');
    ?>
</div>
</body>
</html>