<?php
    session_start();
    require_once('includes/daos/DAOTour.php');
    require_once('includes/daos/DAOValoracion.php');
    $daotour = new DAOTour();
    $daoval = new DAOValoracion();
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
        if($_SESSION['reevaluado']==true){//se esta reevaluando
            $_SESSION['reevaluado']=false;
            ?>
            <h2> Reelvalua nuestro tour:</h2> <br>
            <p>Gracias por ayudarnos.</p>
            <form action="">
            <br>
            <div class="valoration-form">
                <div class="float-block">
                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="0">0✰</label>
                </div>

                <div class="float-block">
                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="1">1✰</label>
                </div>

                <div class="float-block">
                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="2">2✰</label>
                </div>

                <div class="float-block">
                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="3">3✰</label>
                </div>

                <div class="float-block">
                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="4">4✰</label>
                </div>

                <div class="float-block">
                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="5" checked="checked">5✰</label>
                </div>
            </div>
            <button input type="submit" name="submit" value="Submit">Evaluar</button>
            </form>
            <br><br><br>
            <?php
            $_SESSION['modificarevaluacion']=true;
        }
        else if(isset($_SESSION['modificarevaluacion']) && $_SESSION['modificarevaluacion']){
            $val=$_REQUEST["valoracion"];
            $daoval->updatevaloracion($_SESSION['email'],$_SESSION['tourvalorado'],$val); 
            $p=$daotour->getTour($_SESSION['tourvalorado']);
            echo '<h2>Has reevaluado '.$p->getNombreTour().' con '.$val.'/5</h2>';
            echo '<br>';
            echo '<p>Gracias por darnos tu opinión</p>';
            $_SESSION['modificarevaluacion']=false;
        }
        else{
            $val=$_REQUEST["valoracion"];
            $daoval->insertavaloracion($_SESSION['email'],$_SESSION['tourvalorado'],$val); 
            $p=$daotour->getTour($_SESSION['tourvalorado']);
            echo '<h2>Has evaluado '.$p->getNombreTour().' con '.$val.'/5</h2>';
            echo '<br><br>';
            echo '<p>Siempre puedes volver a evaluar el tour otra vez</p>';
        }
        $p=$daotour->getTour($_SESSION['tourvalorado']);
        echo "<br><br>";
        echo '<a href="procesarTour.php?idtour=' . $p->getNumReferencia() . '"><button>Volver al tour</button></a>';
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