<?php
    session_start();
    require('includes/daos/DAOTour.php');
    $arrayTours=(new DAOTour())->getAllTours();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" href="img/logo2.png" type="image/png">
	<meta charset="utf-8">
	<title>Modificar nuevo tour</title>
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
            if(isset($arrayTours)){
                if(count($arrayTours)>0){
                    foreach($arrayTours as $tour){
                        echo '<p><a href="formularioModificarTour.php?idtour='.$tour->getNumReferencia().'"> Nombre:'.$tour->getNombreTour().' Precio:'.$tour->getPrecio().'€ Número de plazas:'.$tour->getNumeroPlazas().'</a></p><br>';
                    }
                }
                else{
                    echo 'No hay tours actualmente en la aplicación';
                }
            }
            else{
                echo 'Error extrayendo los tours de la BBDD';
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
<?php
/*
public function getNombreTour(){
            return $this->nombreTour;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function getNumReferencia(){
            return $this->numreferencia;
        }
        public function getNumeroPlazas(){
            return $this->numeroplazas;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getCategoriaTour(){
            return $this->categoriatour;
        }
        public function getUrlTour(){
            return $this->urltour;
*/

?>