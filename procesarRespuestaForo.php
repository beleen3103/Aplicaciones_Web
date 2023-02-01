<?php
    session_start();
    require('includes/daos/DAOForoRespuesta.php');
    $fororespuestaDAO = new DAOForoRespuesta();
    $respuesta = htmlspecialchars(trim(strip_tags($_REQUEST["respuesta"])));
    $respondido=false;
    if(isset($_REQUEST['idusuarioresponde'])){
        $respondido=$fororespuestaDAO->insertamensajerespuesta($_REQUEST['idforo'],$_SESSION['email'],
        $_REQUEST['idusuarioresponde'],$respuesta);
        unset($_REQUEST['idusuarioresponde']);
    }
    else{
        $respondido=$fororespuestaDAO->insertamensajerespuestaG($_REQUEST['idforo'],$_SESSION['email'],$respuesta);
    }
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
            if ($respondido) {
                echo '<h2>Mensaje insertado con éxito</h2><br><br>';
            }
            else {
                echo '<h2>ERROR</h2>';
                echo '<p>No se ha podido insertar tu entrada.</p><br><br>';
            }
            echo '<a href="procesarForo.php?idforo=' . $_REQUEST['idforo'] . '"><button>Volver al hilo</button></a>';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>