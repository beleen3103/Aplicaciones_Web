<?php
    session_start();
    require('includes/daos/DAONovedad.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Eliminar novedad</title>
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
            <form action='procesarEliminarNovedad.php' method='POST'>
                <h2 class="form-name-eliminar-novedades">Eliminar Novedades</h2>
                <fieldset>
                    <p>Selecciona aquellas novedades que desea eliminar</p><br>
                    <div class="bloc">
                    <select name="novedades[]" multiple>
                    <?php
                        $novedades=(new DAONovedad())->getAllNovedades();
                        foreach($novedades as $novedad) {
                            $infonovedad=$novedad->getautor()." - Titulo:".$novedad->gettitulo();
                            $id=$novedad->getid();
                            echo"<option value=\"$id\" class='option-eliminar'>$infonovedad</option>";
                        }
                    ?>
                    </select></div></p><br><br>
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