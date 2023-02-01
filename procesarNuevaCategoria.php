<?php
    session_start();
    require('includes/daos/DAOTour.php');
    require('includes/daos/DAONovedad.php');

    $insertado=false;
    if(!isset($_POST['categoriaNovedad'])){ // inserta una categoria de novedad en la base de datos
        $categoria = htmlspecialchars(trim(strip_tags($_REQUEST['categoriaTour'])));
        $insertado=(new DAOTour())->insertaCategoria($categoria);
        unset($_POST['categoriaTour']);
    }
    else { // inserta una categoria de tour en la base de datos
        $categoria = htmlspecialchars(trim(strip_tags($_REQUEST['categoriaNovedad'])));
        $insertado=(new DAOnovedad())->insertaCategoria($categoria);
        unset($_POST['categoriaNovedad']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Añadir nueva categoria</title>
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
            if(!$insertado){
                echo'Error al añadir la categoria';
            }
            else{
                echo'La categoria se ha añadido correctamente';
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