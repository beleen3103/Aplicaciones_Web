<?php
    session_start();
    require('includes/daos/DAOForoMensajePrincipal.php');
    $foroDAO = new DAOForoMensajePrincipal();
    $foro = $foroDAO->getAllForo();

    require('includes/daos/DAOForoRespuesta.php');
    $respuestaDAO = new DAOForoRespuesta();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Foro</title>
</head>
<body>
    <div id="contenedor">

        <div id="cabecera">
            <?php
                require('includes/comun/cabecera.php');
            ?>
        </div>

        <div id="contenido">
            <h2>Foro</h2>
            <br>
            <?php
            if(isset($foro)) {
                foreach($foro as $tema){
                    echo '<a href="procesarForo.php?idforo=' .$tema->getidforo(). '"><button class="novedad">'.$tema->gettitulo().'<br><p class="autorForo">'.$tema->getidusuario().'</p></button></a><br><br>';
                    echo "<br>";          
                        
                }
            }
            else {
                echo "<h4>0 resultados</h4>";
            }
            ?>
            <br>
            <br>

            <!-- Nueva entrada al foro-->
            <?php
                if(isset($_SESSION['login'])){
            ?>
            <div class="formulario-foro">
                <form action="procesarMensajePrincipal.php">
                <h2 class="form-name">Añade una nueva entrada al foro</h2><br>
                    <fieldset>
                    <p>Título: </p><input type="text" name='titulo'><br><br>
                    <p>Contenido:</p><br>
                    <textarea type='text' name='contenido' required class="nuevo-foro-textarea"></textarea><br><br>
                    <button type="submit" class="eliminar-form-button">Comentar</button>
                    </fieldset>
                </form>
            </div>
            <?php
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