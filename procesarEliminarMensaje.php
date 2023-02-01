<?php
    session_start();
    require('includes/daos/DAOMensaje.php');
    $borrado=false;
    if(isset($_REQUEST['mensajes'])){
        $mensajesToRemove = $_REQUEST['mensajes'];
        if(count($mensajesToRemove)>0){
            $daoMensaje=new DAOMensaje();
            $i=0;
            while($i<count($mensajesToRemove) && $daoMensaje->delete($mensajesToRemove[$i])){
                $i++;
            }
            if($i==count($mensajesToRemove)){
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
        <?php
            if($borrado)
                echo "Se han borrado exitosamente ".count($mensajesToRemove)." mensaje(s)";
            else    
                echo 'No se han borrado los mensajes';
        ?>
    </div>
	<div id="pie">
		<?php
			require('includes/comun/pie.php');
		?>
	</div>

</body>
</html>