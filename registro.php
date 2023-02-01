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
        <div class="formulario-signup">
            <form action='procesarRegistro.php' method='POST'>
                <h2 class="form-name">Sign up</h2>
                <fieldset>
                    <p>Nombre completo: </p><input type='text' name='nombreusuario_r'> <br><br>
                    <p>Email <b>(Obligatorio)</b>: </p><input type='email' name='email_r' required> <br><br>
                    <p>Contraseña <b>(Obligatorio)</b>: </p><input type='password' name='password_r' required> <br><br>
                    <p>Repite contraseña <b>(Obligatorio)</b>: </p><input type='password' name='passwordrep_r' required> <br><br>
                    <p>Nick: </p><input type='text' name='nick_r'> <br><br>
                    <p>Teléfono: </p><input type='text' name='telefono_r'> <br><br>
                    <p>Dirección: </p><input type='text' name='direccion_r'> <br><br>
                    <br><br>
                    <button type="submit" class="form-button">Sign Up</button>
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