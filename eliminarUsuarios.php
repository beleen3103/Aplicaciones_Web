<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    require('includes/daos/DAOFavoritos.php');
    $borrado=false;
    $borrar=false;
    if(isset($_REQUEST['usuarios'])){
        $usuariosToRemove=$_REQUEST['usuarios'];
        if(count($usuariosToRemove)>0){
            $daoUsuario=new DAOUsuario();
            $i=0;
            while($i<count($usuariosToRemove) && $daoUsuario->delete($usuariosToRemove[$i])){
                $i++;
            }
            if($i==count($usuariosToRemove)){
                $borrado=true;
            }
        }
        else{
            $borrado=true;
        }
        $borrar=true;
        unset($_REQUEST['usuarios']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Eliminar usuarios</title>
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
    if(!$borrar){
    ?>
    <div class="formulario-eliminar">
    <form action='eliminarUsuarios.php' method='POST'>
        
        <h2 class="form-name">Eliminar Usuarios</h2>
        <fieldset>
            <p>Selecciona aquellos usuarios que desea eliminar</p><br>
            <div class="bloc">
            <select name="usuarios[]" multiple size="8">
            <?php
                $usuarios=(new DAOUsuario())->getAllUsuarios($_SESSION["email"]);
                foreach($usuarios as $usuario) {
                    $infoUsuario=$usuario->getnombreusuario()." - Correo.".$usuario->getcorreo();
                    $correo=$usuario->getcorreo();
                    echo"<option value=\"$correo\"  class='option-eliminar'>$infoUsuario</option>";
                }
            ?>
            </select></div></p><br><br>
        <button type="submit" class="eliminar-form-button">Eliminar</button>
        </fieldset>
    </form>
    </div>
    <?php
    }
    else {
        if($borrado){
            echo "Se han borrado exitosamente ".count($usuariosToRemove)." usuario(s)";
        }
        else{
            echo 'Error al borrar a los usuario(s).';   
        }
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