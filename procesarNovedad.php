<!--Muestra todas las novedades que hay en la base de datos por orden de fecha-->
<?php
    session_start();
    require('includes/daos/DAONovedad.php');
    $dao = new DAONovedad();
    $novedad = $dao->getNovedad(($_GET["idnovedad"]));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Novedades</title>
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
            if(!isset($novedad)){
                echo "<h2>0 resultados</h2><br>";
            }
            echo "<h2>". $novedad->gettitulo() ."</h2><br><br>";
            echo "Autor: <b>". $novedad->getautor() ."</b><br><br>";
            echo "Fecha: <b>".$novedad->getfecha().   "</b><br><br>";
            echo "Descripción: <b>" . $novedad->getdescripcion() . "</b><br><br>";
        ?>
    </div>

    <div id="pie">
        <?php
            require('includes/comun/pie.php');
        ?>
    </div>
</div>
</body>
</html>