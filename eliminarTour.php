<?php
    session_start();
    require('includes/daos/DAOTour.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Eliminar nuevo tour</title>
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
            <form action='procesarEliminarTour.php' method='POST'>
                <h2 class="form-name">Eliminar Tours</h2>
                <fieldset>
                    <p>Selecciona aquellos tours que desea eliminar</p><br>
                    <div class="bloc">
                    <select name="tours[]" multiple size="8">
                    <?php
                        $tours=(new DAOTour())->getAllTours();
                        foreach($tours as $tour) {
                            $infoTour=$tour->getNombreTour()." - Ref.".$tour->getNumReferencia();
                            $numreferencia=$tour->getNumReferencia();
                            echo"<option value=\"$numreferencia\" class='option-eliminar'>$infoTour</option>";
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