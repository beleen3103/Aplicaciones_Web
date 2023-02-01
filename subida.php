<?php
session_start();
require('includes/daos/DAOUsuario.php');
require('includes/daos/DAOTour.php');
$usuarioDAO = new DAOUsuario();
$tourDAO = new DAOTour();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = $fileName;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png','jpeg');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'img/'. $_SESSION['pathdir'];
      $dest_path = $uploadFileDir . '/' . $newFileName;

      //Dependiendo de una variable de sesión, actualizamos la imagen del usuario o del tour
      if(isset($_SESSION['pathdir'])){
        if($_SESSION['pathdir'] == "usuarios"){ //Usuarios
          $usuarioDAO->updateurl($_SESSION['email'],$dest_path);
        }
        else { //Tour
          $tourDAO->updateurl($_SESSION['idtourURL'],$dest_path);
        }
      }

      

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='Archivo subido correctamente.';
      }
      else 
      {
        $message = 'Ha habido un error con el directorio en el que se quiere guardar el archivo. Por favor, revise que tiene permisos de escritura.';
      }
    }
    else
    {
      $message = 'Error de subida.\nExtensiones posibles: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'Ha habido un error en la subida del archivo\n';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: editarperfil.php");
exit();