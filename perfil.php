<?php
    session_start();
    require('includes/daos/DAOUsuario.php');
    require('includes/daos/DAOFavoritos.php');
    require('includes/daos/DAOTour.php');
    require('includes/daos/DAOMensaje.php');
    require('includes/daos/DAOCompra.php');
    $daofav = new DAOFavoritos();
    $daotour = new DAOTour();
    $daocompra = new DAOCompra();
    if($_SESSION['login']){
        $usuarioDAO = new DAOUsuario();
        $usuario = $usuarioDAO->getUsuarioE($_SESSION["email"]);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Perfil</title>
</head>

<body>
<div id="contenedor">

	<div id="cabecera">
		<?php
			require('includes/comun/cabecera.php');
		?>
	</div>

	<div id="contenido">
        <h2>Tu perfil</h2>
        <img src=<?php echo '"'.$usuario->geturlfoto().'"'?> class="profile-pic"/>
        <p>Nombre: <b><?php echo $usuario->getnombreusuario();?></b></p> 
        <p>Email: <b><?php echo $usuario->getcorreo();?></b></p> 
        <p>Nick: <b><?php echo $usuario->getnick();?></b></p> 
        <p>Rol: <b><?php echo $usuario->getrol();?></b></p> 
        <p>Teléfono: <b><?php echo $usuario->gettelefono();?></b></p> 
        <p>Dirección: <b><?php echo $usuario->getdireccion(); ?></b></p>
        <br><br>
  </form>
        <a href="editarperfil.php"><button>Editar perfil</button></a>
        <a href="editarcontrasenia.php"><button>Cambiar contraseña</button></a><br><br>
        <br><br>
        <!-- Favoritos-->
        <h2>Favoritos</h2>
        <?php
            $allFavs = $daofav->getallfavoritos($_SESSION['email']);
            if(count($allFavs)==0){
                echo '<p>En estos momentos no tienes ningún tour favorito, ve a la tienda y añade el primero</p><br>';
            }
            else{
                echo '<p>Tienes '.count($allFavs).' tours en favoritos.</p><br>';
                foreach($allFavs as $fav){
                    $idtour=$fav->getidtour();
                    $tour = $daotour->getTour($idtour);
                    echo '<a href="procesarTour.php?idtour=' . $idtour . '"><button>' . $tour->getNombreTour() . '</button></a> ';
                }
            }
            echo '<br><br>';
        ?>
        <!-- Mis compras -->
        <h2>Mis compras</h2>
        <br>
        <?php
            $allPedidos = $daocompra->getAllComprasUser($_SESSION['email']);
            if(count($allPedidos)==0){
                echo '<p>No has realizado ninguna compra, ve a la tienda y compra tu primer tour</p><br>';
            }
            else{
        ?>
        <button onclick='myFunction()'>Mostrar pedidos</button>
        <br><br>
        <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        </script>
        <?php
                echo "<div id='myDIV' style='display:none'>";
                echo '<p>Has realizado '.count($allPedidos).' compras.</p><br>';
                foreach($allPedidos as $compra) {
                    $idtour = $compra->getidTour();
                    $tour = $daotour->getTour($idtour);
                    echo "<b>Tour: </b>" . $tour->getNombreTour() . "<br>";
                    echo "<b>Categoría: </b>" . $tour->getCategoriaTour() . "<br>";
                    echo "<b>Precio: </b>" . $compra->getPrecio() . "<br>";
                    echo "<b>Num. plazas: </b>" . $compra->getPlazas() . "<br>";
                    echo "<b>Fecha de compra: </b>" . $compra->getFecha() . "<br>";
                    echo "<br><hr><br>";
                }
                echo "</div>";
            }



            if($usuario->getrol()=="admin" || $usuario->getrol()=="guia"){
        ?>      <br><br><hr><br>
                <h2>Panel de control</h2><br>   
                <h3>Tours</h3>
                <a href="nuevoTour.php"><button>Añadir nuevo tour</button></a>
                <a href="modificarTour.php"><button>Modificar tour</button></a>
                <a href="eliminarTour.php"><button>Eliminar tour</button></a>
                <br><br>
                <?php
                if($usuario->getrol()=="admin"){
                ?>
                    <h3>Novedades</h3>
                    <a href="nuevaNovedad.php"><button>Añadir novedad</button></a>
                    <a href="modificarNovedad.php"><button>Modificar novedad</button></a>
                    <a href="eliminarNovedad.php"><button>Eliminar novedad</button></a>
                    <br><br>
                    <h3>Usuarios</h3>
                    <a href="eliminarUsuarios.php"><button>Eliminar usuarios</button></a><br><br>
                    <h3>Eliminar mensajes</h3>
                    <a href="eliminarMensaje.php"><button>Eliminar mensajes</button></a><br><br>
                    <h3>Lista de mensajes</h3>
                <?php
                    $mensajes=(new DAOMensaje())->getAllMensajes();
                    if(count($mensajes)>0){
                        foreach($mensajes as $mensaje){
                            echo'<p>Nombre:'.$mensaje->getNombre().'</p>';
                            echo'<p>Correo:'.$mensaje->getCorreo().'</p>';
                            echo'<p>Fecha:'.$mensaje->getFecha().'</p>';
                            echo'<p>Asunto:'.$mensaje->getAsunto().'</p>';
                            echo'<p>Contenido:'.$mensaje->getContenido().'</p><hr>';
                        }
                    }
                    else {
                        echo 'No se han enviado mensajes al administrador';
                    }
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