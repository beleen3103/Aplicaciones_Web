<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    $usuarioDAO = new DAOUsuario();
   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Editar perfil</title>
</head>

<body>
<div id="contenedor">

	<div id="cabecera">
		<?php
			require('includes/comun/cabecera.php');
		?>
	</div>
    <?php
         $usuario = $usuarioDAO->getUsuarioE($_SESSION["email"]);
    ?>
	<div id="contenido">
    <div class="formulario-editar-perfil">
        <form action='procesareditarperfil.php' method='POST'>
            <h2 class="form-name">Editar perfil</h2>
            <fieldset>
                <p>Nombre completo: </p><input type='text' name='nombreusuario_r' value="<?php echo $usuario->getnombreusuario()?>"> <br><br>
                <p>Email(No modificable): </p><?php echo $usuario->getcorreo()?> <br><br> 
                <p>Nick: </p><input type='text' name='nick_r'value="<?php echo $usuario->getnick()?>"> <br><br>
                <p>Teléfono: </p><input type='text' name='telefono_r'value="<?php echo $usuario->gettelefono()?>"> <br><br>
                <p>Dirección: </p><input type='text' name='direccion_r'value="<?php echo $usuario->getdireccion()?>"> <br><br>
                </br>
                <button type="submit" class="form-button">Editar</button>
            </fieldset>
        </form>
    </div>
    <br><br>
    
    <!-- Subida ficheros -->
    <?php
    $_SESSION['pathdir']='usuarios';
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