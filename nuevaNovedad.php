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
	<title>Añadir nueva novedad</title>
</head>

<body>
<div id="contenedor">

	<div id="cabecera">
		<?php
			require('includes/comun/cabecera.php');
		?>
	</div>
	<div id="contenido">

    <div class="formulario-nueva-novedad">
        <form action='procesarNuevaNovedad.php' method='POST'>
            <h2 class="form-name">Nueva Novedad</h2>
            <fieldset>
                <p>Autor: <br><input type='text' name='autor' required></p><br>
                <p>Titulo: <br><input type='text' name='titulo' required></p><br><br>
                <p>Categoría: 
                    <select name="novedad">
                    <?php
                        $novedades=(new DAONovedad())->getAllCategoriasNovedades();
                        foreach($novedades as $novedad) {
                            $nombre=$novedad->getCategoria();
                            echo"<option value=\"$nombre\">$nombre</option>";
                        }
                    ?>
                    </select></p><br><br>
                <p>Noticia: <br><br><textarea type='text' name='desc' required class="nueva-novedad-textarea"></textarea></p><br>
                <button type="submit" class="nueva-novedad-button">Añadir</button>
            </fieldset>
        </form>
    </div>
    
    <br><br>

    <div class="formulario-nueva-categoria">
        <form action='procesarNuevaCategoria.php' method='POST'>
            <h2 class="form-name">Nueva Categoría</h2>
            <fieldset>
                <p>Nombre: <input type='text' name='categoriaNovedad' required></p><br><br>
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