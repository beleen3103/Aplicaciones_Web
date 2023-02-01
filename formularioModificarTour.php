<?php
    session_start();
    require('includes/daos/DAOTour.php');
    $dao = new DAOTour();
    $tour = $dao->getTour($_GET["idtour"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Formulario nuevo tour</title>
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
        <form <?php echo 'action="procesarActualizarTour.php?idtour='.$_GET['idtour'].'"';?> method='POST'>
            <h2 class="form-name">Editar Tour</h2>
            <fieldset>
            <p>Nombre: <br><input type='text' name='newName' <?php echo 'value="'.$tour->getNombreTour().'"';?> required></p><br>
            <p>Precio (€): <input type='number' name='newPrice' <?php echo 'value="'.$tour->getPrecio().'"';?> step='any' min='0' required></p><br>
            <p>Número de plazas: <input type='number' name='newNumSeats' <?php echo 'value="'.$tour->getNumeroPlazas().'"';?> min="1" required></p><br>
            <p>Categoría del tour: 
                <select name="newCategoria">
                <?php
                    $categorias=$dao->getAllCategorias();
                    $selected='';
                    foreach($categorias as $categoria) {
                        $nombre=$categoria->getCategoria();
                        if($nombre==$tour->getCategoriaTour())
                            $selected='selected';
                        echo'<option value="'.$nombre.'" '.$selected.'>'.$nombre.'</option>';
                        $selected='';
                    }
                ?>
                </select></p><br>
            <p>Descripción:<br><br></p><p><textarea type='text' name='newDesc' required class="nuevo-tour-textarea"><?php echo $tour->getDescripcion();?></textarea></p><br><br>
            <button type="submit" class="nuevo-tour-form-button">Actualizar</button>
            </fieldset>
        </form>
    </div>

    <br><br>


                    <!-- Subida ficheros -->
    <?php
    $_SESSION['pathdir']='tours';
    ?>
    <div class="formulario-editar-imagen">
        <form method="POST" action="subida.php" enctype="multipart/form-data">
            <fieldset>
            <h2 class="form-name">Nueva foto</h2>
            <input type="file" name="uploadedFile"/><br><br>
            <button type="submit" name="uploadBtn" value="Upload" class="form-button">Upload</button>
            </fieldset>
        </form>
    </div>

    <?php
    if(isset($_SESSION['message'])) {
    ?>
        <script>
            alert('<?php echo $_SESSION["message"]?>');
            window.location.href='perfil.php';
        </script>
    <?php
        unset($_SESSION["message"]);
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