<?php
    session_start();
    require('includes/daos/DAOMensaje.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Eliminar mensaje</title>
</head>

<body>
<div id="contenedor">

	<div id="cabecera">
		<?php
			require('includes/comun/cabecera.php');
		?>
	</div>
	<div id="contenido">
        <div class="formulario-eliminar">
            <form action='procesarEliminarMensaje.php' method='POST'>
                <h2 class="form-name">Eliminar Mensajes</h2>
                <fieldset>
                    <p>Selecciona aquellos mensajes que desea eliminar</p><br>
                    <?php
                        $mensajes=(new DAOMensaje())->getAllMensajes();
                        if(count($mensajes)<=0){
                            echo "<b><i>No tienes ningún mensaje en este momento</i></b>";
                        }
                    ?>
                    <div class="bloc">
                    <select name="mensajes[]" multiple>
                    <?php
                        foreach($mensajes as $mensaje) {
                            $infomensaje=$mensaje->getCorreo()." - Asunto:".$mensaje->getAsunto()." - Fecha:".$mensaje->getFecha();
                            $id=$mensaje->getIdMensaje();
                            echo"<option value=\"$id\" class='option-eliminar'>$infomensaje</option>";
                        }
                    ?>
                    </select></div><br><br>
                    <button type="submit" class="eliminar-form-button">Eliminar</button>
                </fieldset>
            </form>
        </div>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>