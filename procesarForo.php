<?php
    session_start();
    require('includes/daos/DAOForoMensajePrincipal.php');
    $foroDAO = new DAOForoMensajePrincipal();
    $foro = $foroDAO->getForo($_GET["idforo"]);

    require('includes/daos/DAOForoRespuesta.php');
    $respuestaDAO = new DAOForoRespuesta();
    $respuestas = $respuestaDAO->getAllRespuestasPorForo($_GET["idforo"]);
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
            <?php
                echo "<div class='mensaje-principal'>";
                echo "<h2>". $foro->gettitulo() ."</h2><br>";
                echo "<p>Autor/a:</p> <p><b>". $foro->getidUsuario() ."</b></p><br><br>";
                echo "<p>Texto:</p> <p><b>".$foro->gettexto().   "</b></p>";
                echo "</div><br><br><br><br><br>";
            ?>
        
        <?php
            //Respuestas
            foreach($respuestas as $respuesta){
                echo "<div class='comentario-foro'>";
                echo "<b><div class='usuarios-foro'><h4>".$respuesta->getiduserpublica()."</h4></b> ";
                if ($respuesta->getiduserresponde() != NULL){
                    echo "<div class='respuesta-foro'>".$respuesta->getiduserresponde()."</div>";

                }
                echo "</div><br>";
                echo $respuesta->gettexto();
                echo "</div>";
                
                if(isset($_SESSION["email"])){
        ?>  
                    <div class='nuevo-comentario-foro'>
                        <form <?php echo 'action="procesarRespuestaForo.php?idusuarioresponde='.$respuesta->getiduserpublica().'&idforo='.$foro->getidforo().'"';?> method='POST'>
                            <p>Responder:</p><br>
                            <textarea type="text" name="respuesta" required></textarea><br><br>
                            <button type="submit" class="form-button">Comentar</button><br>
                        </form>
                    </div>
                    <br><br><br>
        <?php      
                }
                echo "<br><br><hr><br><br>";
            }

            if(!isset($_SESSION["email"])){
                echo "<h3><a href='registro.php'><i>Regístrate</i></a> para comentar en el foro</h3></a><br><br>";
            }
            else {
        ?>
                <hr><br><br>
                <div class="nuevo-comentario-foro">
                <form <?php echo 'action="procesarRespuestaForo.php?idforo='.$foro->getidforo().'"';?> method='POST'>
                        <h3>Responder al hilo principal:</h3><br>
                        <textarea type="text" name="respuesta" required></textarea><br><br>
                        <button type="submit" class="form-button">Comentar</button>
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