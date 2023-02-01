<?php
    session_start();
    require_once('includes/daos/DAOTour.php');
    require_once('includes/daos/DAOComentario.php');
    require_once('includes/daos/DAOFavoritos.php');
    require_once('includes/daos/DAOValoracion.php');
    $dao = new DAOTour();
    $tour = $dao->getTour($_GET["idtour"]);
    $daofav = new DAOFavoritos();
    $daoval = new DAOValoracion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
    <title>Madrid Mad Tour - Tour</title>
</head>
<body>
<div id="contenedor">

    <div id="cabecera">
        <?php
            require('includes/comun/cabecera.php');
        ?>
    </div>

    <div id="contenido">

        <div class="horizontal-line">

            <div class="tour-datos">

                <?php
                    if(!isset($tour)){
                        echo "<h1>No se han encontrado Tours con esta categoría</h1><br>";
                    }
                    echo '<img src="'.$tour->getUrlTour().'" width="300"/><br><br>';
                    echo "Nombre: <b>" . $tour->getNombreTour()."</b><br><br>";
                    echo "Categoría: <b>" . $tour->getCategoriaTour()."</b><br><br>";
                    echo "Precio: <b>" . $tour->getPrecio()."€</b><br><br>";
                    echo "Núm.Plazas disponibles: <b>".$tour->getNumeroPlazas()."</b><br><br>";
                    echo "Descripción: <b>" . $tour->getDescripcion()."</b><br><br><br><br>";
                ?>

            </div>
            
            <div class="tour-logueado">
                <?php
                if(isset($_SESSION['login'])&&$_SESSION['login']){
                    //Favoritos
                    echo '<form action="procesarFavoritos.php?">';
                    if(isset($_SESSION['login'])){
                        if(!$daofav->yaenfavoritos($_SESSION['email'],$tour->getNumReferencia())){
                            $_SESSION['tourfavoritoono']=true;
                            $_SESSION['tourprocesadofavoritos']=$tour->getNumReferencia();//Al acabar el mensaje se hece su unset.
                            echo '<button type="submit" name="fav">Añadir a Favoritos</button><br><br>';
                            echo'</form>'; 
                        }
                        else {
                            //estas variables se necesitan en procesar favoritos para mandar el mensaje confirmacion. 
                            $_SESSION['tourfavoritoono']=false;
                            $_SESSION['tourprocesadofavoritos']=$tour->getNumReferencia();//Al acabar el mensaje se hece su unset.
                            echo '<button type="submit" name="fav">Elimina de Favoritos</button><br><br>';
                            echo'</form>'; 
                        }
                    }

                    //Añadir al carrito
                    echo '<br><br><form action="procesarCarrito.php?">';
                    echo '<button type="submit" name="idtour" value="' . $tour->getNumReferencia() . '">Añadir al carrito</button><br><br>';
                    echo 'Cantidad seleccionada: ';
                    echo '<input type="number" id="cantidad" name="cantidad" min="1" max="' . $tour->getNumeroPlazas() . '" value="1"><br><br>';
                    echo '</form>';
                    echo '<br><br>';

                    //Valoracion
                    echo '<form action="procesarValoracion.php?">';
                    if(isset($_SESSION['login'])){
                        echo '<h2>Valora este tour:</h2>';
                        $_SESSION['tourvalorado']=$tour->getNumReferencia();
                        if($daoval->yavalorado($_SESSION['email'],$tour->getNumReferencia())){
                            echo '<br>';
                            echo '<p><b>Ya has valorado este tour con un 
                            total de '.$daoval->getvaloracion($_SESSION['email'],$tour->getNumReferencia()).'/5, ¿Quieres 
                            volver a evaluarlo?</b></p>';
                            $_SESSION['reevaluado']=true;
                            echo '<br>';
                            echo '<button input type="submit" name="submit" value="Submit">Revaluar</button><br><br>';
                            echo '</form>';
                        }
                        else {
                            ?>
                            <br>
                            <div class="valoration-form">
                                <div class="float-block">
                                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="0">0✰</label>
                                </div>

                                <div class="float-block">
                                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="1">1✰</label>
                                </div>

                                <div class="float-block">
                                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="2">2✰</label>
                                </div>

                                <div class="float-block">
                                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="3">3✰</label>
                                </div>

                                <div class="float-block">
                                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="4">4✰</label>
                                </div>

                                <div class="float-block">
                                    <label for="always" class="valoration-label"><input type="radio" name="valoracion" value="5" checked="checked">5✰</label>
                                </div>
                            </div>
                            <button input type="submit" name="submit" value="Submit">Evaluar</button>
                            <br>
                            </form>
                            <?php
                            $_SESSION['reevaluado']=false;
                        }
                    }
                ?> 
            </div>
        </div>

        <!--Añadir comentario-->
        <form <?php echo 'action="procesarComentario.php?idtour='.$_GET['idtour'].'"';?> method='POST'>
            <p><textarea type="text" name="contenido" required></textarea></p><br>
            <button type="submit" name="comment" value="">Añadir comentario</button>
        </form>
        <?php
            }
            else {
                echo '</div></div>';
            }
        ?>
    
        <div class="tour-val-coment">

            <?php
                //Mostrar todas las valoraciones y comentarios
                //Coger comentarios
                $comentarios=(new DAOComentario())->getAllComentariosPorTour($tour->getNumReferencia());
                $numComentarios=count($comentarios);
                echo '<br><br><br>';
                echo '<h2>Comentarios</h2>';
                echo '<br>';
                echo '<p>Hay un total de '.$numComentarios.' comentario(s)</p>';
                foreach($comentarios as $comentario){
                    echo '<fieldset class="val-com">';
                    echo '<p><b>'.$comentario->getNickUsuario().' comenta ('.$comentario->getFecha().')</b></p>';
                    echo '<p>'.$comentario->getContenido().'</p>';
                    echo '</fieldset>';
                    echo '<br>';
                }
                $allValoraciones=$daoval->getallvaloraciones($tour->getNumReferencia());
                echo '<br><br><br>';
                echo '<h2>Valoraciones</h2>';
                echo '<br>';
                foreach($allValoraciones as $valoracion){
                    echo '<fieldset class="val-stars">';
                    echo '<div><b>'.$valoracion->getidusuario().'</b></div>';
                    switch ($valoracion->getvaloracion()){
                        case 0:
                            $stars = '<img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star">';
                        break;

                        case 1:
                            $stars = '<img src="img/estrella.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star">';
                        break;

                        case 2:
                            $stars = '<img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star">';
                        break;

                        case 3:
                            $stars = '<img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella-vacia.png" alt="star"> <img src="img/estrella-vacia.png" alt="star">';
                        break;

                        case 4:
                            $stars = '<img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella-vacia.png" alt="star">';
                        break;

                        case 5:
                            $stars = '<img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star"> <img src="img/estrella.png" alt="star">';
                        break;
                    }
                    echo "<div class='stars'>".$stars."</div>";
                    echo '</fieldset>';
                    echo '<br>';
                }
                echo "<br><br><br>"
            ?>
            

        </div>
        <div class="tour-val-coment">
            <h2>Recomendados</h2>
            <p>Los usuarios que han comprado este tour también han comprado los siguientes tours</p><br>
            <?php
                //Recomendados
                $recomendados=$dao->getRecomendados($_GET['idtour']);
                foreach($recomendados as $recomendado){
                    echo '<a href="procesarTour.php?idtour='.$recomendado->getNumReferencia().'"><button class="tour-button">'. $recomendado->getNombreTour().'</button></a>';
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