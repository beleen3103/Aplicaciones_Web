<?php
    session_start();
    require_once('includes/daos/DAOTour.php');
    require_once('includes/daos/DAOFavoritos.php');
    $dao = new DAOTour();
    $daofav = new DAOFavoritos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Tour</title>
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
        $tour = $dao->getTour($_SESSION["tourprocesadofavoritos"]);
            if($_SESSION['tourfavoritoono']){
                $daofav->insertafavorito($_SESSION['email'],$_SESSION['tourprocesadofavoritos']);
                echo '<h1>'.$tour->getNombreTour().' añadido a favoritos con éxito.</h1>';
            }
            else{
                $daofav->deletefavorito($_SESSION['email'],$_SESSION['tourprocesadofavoritos']);
                echo '<h1>'.$tour->getNombreTour().' eliminado favoritos con éxito.</h1>';
            }
            unset($_SESSION["tourprocesadofavoritos"]);
            unset($_SESSION['tourfavoritoono']);
            echo "<br>";
            echo '<a href="procesarTour.php?idtour=' . $tour->getNumReferencia() . '"><button class="tour-button">Volver al tour</button></a>';
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