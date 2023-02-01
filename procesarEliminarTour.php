<?php
    session_start();
    require('includes/daos/DAOTour.php');
    $toursToRemove = $_REQUEST['tours'];
    $borrado=false;
    if(isset($toursToRemove)){
        if(count($toursToRemove)>0){
            $daoTour=new DAOTour();
            $i=0;
            while($i<count($toursToRemove) && $daoTour->delete($toursToRemove[$i])){
                $i++;
            }
            if($i==count($toursToRemove)){
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
        <?php
            if($borrado)
                echo "Se han borrado exitosamente ".count($toursToRemove)." tour(s)";
            else    
                echo '¡Error borrando los tours!';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>