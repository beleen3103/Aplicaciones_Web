<?php
    session_start();
    require('includes/daos/DAONovedad.php');
    $arrayNovedades=(new DAONovedad())->getAllNovedades();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Modificar novedad</title>
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
            if(isset($arrayNovedades)){
                if(count($arrayNovedades)>0){
                    foreach($arrayNovedades as $novedad){
                        echo '<p><a href="formularioModificarNovedad.php?idnovedad='.$novedad->getid().'"> Autor:'.$novedad->getAutor().' Título:'.$novedad->gettitulo().' Fecha:'.$novedad->getfecha().'</a></p><br>';
                    }
                }
                else{
                    echo 'No hay novedades actualmente en la aplicación';
                }
            }
            else{
                echo 'Error extrayendo las novedades de la BBDD';
            }
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>