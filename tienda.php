<?php
    session_start();
    require('includes/daos/DAOTour.php');
    $tourDAO = new DAOTour();
    $allTours = $tourDAO->getAllTours();
    $allCategorias = $tourDAO->getAllCategorias();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Tienda</title>
</head>
<body>
<div id="contenedor">

    <div id="cabecera">
        <?php
            require('includes/comun/cabecera.php');
        ?>
    </div>

    <div id="contenido">
    <h2>Categorías</h2>
    <br>
    <br>
        <div class="flex-categorias">
            <?php
                foreach($allCategorias as $categoria){
                    echo '<div class="categoria-container"><img src="'.$categoria->getUrl().'"/>';
                    echo '<a href="procesarCategoriaTour.php?categoria='.$categoria->getCategoria().'"><button class="categoria-btn">'.$categoria->getCategoria().'</button></div></a>';
                }
            ?>
        </div>
    </div>

    <div id="pie">
        <?php
            require('includes/comun/pie.php');
        ?>
    </div>
</div>
</body>
</html>
