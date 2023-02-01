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
	<title>Añadir nuevo tour</title>
</head>

<body>
<div id="contenedor">

	<div id="cabecera">
		<?php
			require('includes/comun/cabecera.php');
		?>
	</div>
	<div id="contenido">
        <div class="formulario-nuevo-tour">
            <form action='procesarNuevoTour.php' method='POST'>
                <h2 class="form-name">Nuevo Tour</h2>
                <fieldset>
                    <p>Nombre: <br><input type='text' name='nameTour' required></p><br>
                    <p>Precio (€): <input type='number' name='priceTour' step='any' min='0' required></p><br>
                    <p>Número de plazas: <input type='number' name='numSeats' value="1" min="1" required></p><br>
                    <p>Categoría del tour: 
                    <select name="categoria">
                    <?php
                        $categorias=(new DAOTour())->getAllCategorias();
                        foreach($categorias as $categoria) {
                            $nombre=$categoria->getCategoria();
                            echo"<option value=\"$nombre\">$nombre</option>";
                        }
                    ?>
                    </select></p><br>
                    <p>Descripción: <br><br><textarea type='text' name='desc' required class="nuevo-tour-textarea"></textarea></p><br><br>
                    <button type="submit" class="nuevo-tour-form-button">Añadir</button>
                </fieldset>
            </form>
        </div>

        <br><br><br>

        <div class="formulario-nueva-categoria">
            <form action='procesarNuevaCategoria.php' method='POST'>
                <h2 class="form-name">Nueva Categoría</h2>
                <fieldset>
                    <p>Nombre: <br><input type='text' name='categoriaTour' required></p><br><br>
                    <button type="submit" class="nueva-categoria-form-button">Añadir</button>
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