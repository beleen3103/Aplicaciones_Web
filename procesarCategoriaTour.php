<?php
    session_start();
    require('includes/daos/DAOTour.php');
    $dao = new DAOTour();
    $allTours = $dao->getTourPorCategoria($_GET["categoria"]);
    $categoria = $dao->getCategoria($_GET["categoria"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Categoría</title>
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
            if(count($allTours) == 0){
                echo "<h1>No se han encontrado tours con esta categoría</h1><br>";
            }
            echo "<h2>Tours de " . strtolower($_GET["categoria"]) . "</h2><br><br>";
            foreach($allTours as $tour){
                echo '<a href="procesarTour.php?idtour='.$tour->getNumReferencia().'"><button class="tour-button">'. $tour->getNombreTour().'</button></a><br><br>';
            }
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