<?php
    session_start();
    require('includes/daos/DAOForoMensajePrincipal.php');
    $foroDAO = new DAOForoMensajePrincipal();
    $titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
    $contenido = htmlspecialchars(trim(strip_tags($_REQUEST["contenido"])));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Proceso MP</title>
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
            if ($foroDAO->insertamensajeprincipal($_SESSION['email'],$titulo,$contenido)) { 
        ?>
                <h2>Mensaje insertado con éxito</h2><br><br>
        <?php
            }
            else { 
                echo '<h2>ERROR</h2>';
                echo '<p>No se ha podido insertar tu entrada.</p><br><br>';
            }
        ?>
        <a href="foro.php"><button class="form-button">Volver al foro</button></a>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>