<?php
    session_start();
    require('includes/daos/DAONovedad.php');
    $dao = new DAONovedad();
    $novedad = $dao->getNovedad($_GET["idnovedad"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Formulario nueva novedad</title>
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
        <form <?php echo 'action="procesarActualizarNovedad.php?idnovedad='.$_GET['idnovedad'].'"';?> method='POST'>
            <h2 class="form-name">Editar Novedad</h2>
            <fieldset>
            <p>Autor: <input type='text' name='newAutor' <?php echo 'value="'.$novedad->getautor().'"';?> required></p><br>
            <p>Titulo: <input type='text' name='newTitulo' <?php echo 'value="'.$novedad->gettitulo().'"';?> required></p><br><br>
            <p>Categoría: 
                <select name="newCategoria">
                <?php
                    $categorias=$dao->getAllCategoriasNovedades();
                    $selected='';
                    foreach($categorias as $categoria) {
                        $nombre=$categoria->getCategoria();
                        if($nombre==$novedad->getcategorianovedades())
                            $selected='selected';
                        echo'<option value="'.$nombre.'" '.$selected.'>'.$nombre.'</option>';
                        $selected='';
                    }
                ?>
                </select></p><br><br>
            <p>Noticia:<br><br></p><p><textarea type='text' name='newDesc' required class="nueva-novedad-textarea"><?php echo $novedad->getdescripcion();?></textarea></p><br>
            <button type="submit" class="nueva-novedad-button">Actualizar</button>
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