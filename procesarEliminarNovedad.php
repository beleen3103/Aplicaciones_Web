<?php
    session_start();
    require('includes/daos/DAONovedad.php');
    $novedadesToRemove = $_REQUEST['novedades'];
    $borrado=false;
    if(isset($novedadesToRemove)){
        if(count($novedadesToRemove)>0){
            $daoNovedad=new DAONovedad();
            $i=0;
            while($i<count($novedadesToRemove) && $daoNovedad->delete($novedadesToRemove[$i])){
                $i++;
            }
            if($i==count($novedadesToRemove)){
                $borrado=true;
            }
        }
        else{
            $borrado=true;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Eliminar nueva novedad</title>
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
            if($borrado)
                echo "Se han borrado exitosamente ".count($novedadesToRemove)." novedad(es)";
            else    
                echo '¡Error en el borrado!';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>