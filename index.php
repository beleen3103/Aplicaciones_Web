<?php
    session_start();
    require('includes/daos/DAOValoracion.php');
    $dao = new DAOValoracion();
    $arraytours = $dao->getMostRankedTours();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://kit.fontawesome.com/9f2a0378b5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Página Principal</title>
</head>
<body>
    <div id="contenedor">
        <div id="cabecera">
            <?php
                require("includes/comun/cabecera.php");
            ?>
        </div>
        <div id="contenido">
            <h2>¡Bienvenido a Madrid Mad Tour!</h2>
            <p>La mejor web de tours para todas las edades y gustos centrada en la Comunidad de Madrid.</p>
            <p>Conoce nuestro catálogo de <b><a href="tienda.php">Tours</a></b> accediendo a nuestro apartado dedicado. Los encontrarás ordenados por diferentes categorías.</p>
            <p>Además, si tienes una cuenta personal podrás añadirlos al <b>Carrito</b> para comprarlos posteriormente. ¡Así que no dudes en <b><a href="registro.php">Registrarte</a></b>!</p>
            <p>También tenemos una sección de <b><a href="novedades.php">Novedades</a></b> con diferentes noticias relevantes en Madrid con el autor de la misma. ¡No olvides hecharle un ojo para no perderte nada!</p>
            <p>Pronto la web contará con más contenido único para hacer que tu experiencia en Madrid Mad Tour sea la mejor posible</p>
            <!--<div class="bestTours">-->
                <br><br>
                <div class="rank-title">
                <h2>Tours mejor valorados</h2>
                </div>
                <div class="rank">
                <?php
                    $i = 1;
                    foreach($arraytours as $tour){
                        $idtour=$tour['id'];
                        $nombretour=$tour['nombre'];
                        $total_valoraciones=$tour['total_points'];
                        $class = "rank".$i;
                        echo'<a href="procesarTour.php?idtour='.$idtour.'""><button class="'.$class.'"><div class="rank-content"><div><h1>'.$i.'</h1></div><div><b>'.$nombretour.'</b><br><p>'.$total_valoraciones.'</p></div></div></button></a>';    
                        $i++;
                    }
                ?>
                </div>



            <!--</div>-->
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=14kscKnnru9D0wLUrNTJci1v6Qk_3aO9Z" width="100%" height="480"></iframe>
        </div>
        <div id="pie">
            <?php
                require("includes/comun/pie.php");
            ?>
        </div>
    </div>
</body>
</html>