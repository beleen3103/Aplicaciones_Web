<?php
    session_start();
    require('includes/daos/DAONovedad.php');
    $novedadDAO = new DAONovedad();
    $allCategorias = $novedadDAO->getAllCategoriasNovedades();
    $allNovedades = $novedadDAO->getAllNovedades();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Novedades</title>
</head>
<body>
<div id="contenedor">

<div id="cabecera">
    <?php
        require('includes/comun/cabecera.php');
    ?>
</div>
<div id="contenido">
    <h2>Novedades</h2><br>
    <?php
    if(isset($allCategorias)) {
        $i = 0;
        foreach($allCategorias as $categoria){
            $allNovedades = $novedadDAO->getAllNovedadesCategoria($categoria->getCategoria());
            ?>

            <button onclick="mostrarNovedades<?php echo $i?>()"><?php echo $categoria->getCategoria()?></button>
            <br><br>
            <script>
            function mostrarNovedades<?php echo $i?>() {
                var x = document.getElementById("novedades-<?php echo $i?>");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            </script>
            
            
            <?php
            echo "<div id='novedades-".$i."' style='display:none'>";
            foreach($allNovedades as $novedad){
                echo '<a href="procesarNovedad.php?idnovedad=' .$novedad->getid(). '"><button class="novedad">' .$novedad->gettitulo().  '</button></a><br><br>';
                echo 'Autor: ' .$novedad->getautor(). '<br>Fecha: ' .$novedad->getfecha().  '<br><br>';
                echo "<hr><br><br>";
            }
            echo "</div>";
            $i++;
            
        }
    }
    else {
        echo "<h4>0 resultados</h4>";
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