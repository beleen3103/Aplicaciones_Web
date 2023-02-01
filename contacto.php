<?php
    session_start();
    $usuario="<br><input type='text' name='nombre' required>";
    $email="<br><input type='text' name='email' required>";
    if(isset($_SESSION["login"])&&$_SESSION["login"]){
        $usuario=$_SESSION["nick"];
        $email=$_SESSION["email"];
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Contacto</title>
</head>
<body>
<div id="contenedor">

    <div id="cabecera">
        <?php
            require('includes/comun/cabecera.php');
        ?>
    </div>

    <div id="contenido">
        <div class="formulario-contacto">
            <form action="procesarMensaje.php" method='POST' class="contacto">
                <h2 class="form-name">Contacto</h2>
                <fieldset>
                <p>Nombre: <?php echo $usuario?></p><br>
                <p>Email: <?php echo $email?></p><br>
                <p>Asunto: <br><input type='text' name='asunto' required></p><br>
                <p>Contenido:<br></p><p><textarea type='text' name='contenido' required class="contacto-textarea"></textarea></p><br>
                <button type="submit" class="contacto-form-button">Enviar</button>
                </fieldset>
            </form>
        </div>
        
    </div>

    <div id="pie">
        <?php
            require('includes/comun/pie.php');
        ?>
    </div>
</div>
</body>
</html>