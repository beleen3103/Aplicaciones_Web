<?php
require('includes/usuario.php');
require("includes/config.php");
//Clase encargada de actualizar la información del objeto Usuario en la BBDD
class DAOUsuario {

    //get usuario para el proceso de login
    public function getUsuario($emailS,$password) {
        $db = getConexionBD();
        $verificado=false;
        $sql = "SELECT contrasenia FROM usuario WHERE correo = '$emailS'";
        $rs = mysqli_query($db,$sql);
        $p = new Usuario();
        if($rs){
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $res=$fila['contrasenia'];
                if (password_verify($password, $res)) { //$res
                    $verificado=true;
                } else {
                    $p->setcorreo(NULL);
                }
            }
        }
        else{
            echo "Error al consultar la BD";
            //return false;
        }
        if($verificado){
            $sql2 = "SELECT correo, contrasenia, nombreusuario, rol, telefono, direccion, nick, urlfoto 
                FROM usuario WHERE correo = '$emailS'";
            $res2 = mysqli_query($db,$sql2);
            $fila = mysqli_fetch_assoc($res2);
            $p->setnombreusuario($fila['nombreusuario']);
            $p->setcorreo($fila['correo']);
            $p->setcontrasenia($fila['contrasenia']);
            $p->setrol($fila['rol']);
            $p->settelefono($fila['telefono']);
            $p->setdireccion($fila['direccion']);
            $p->setnick($fila['nick']);
            $p->seturlfoto($fila['urlfoto']);
        }
        else{
            $p->setcorreo(NULL);
        }
        return $p;
    }

    //get usuario para una vez registrado, tenemos problemas con la sal
    public function getUsuarioE($emailS) {
        $db = getConexionBD();
        $p = new Usuario();
        $sql2 = "SELECT correo, contrasenia, nombreusuario, rol, telefono, direccion, nick, urlfoto 
                FROM usuario WHERE correo = '$emailS'";
        $res2 = mysqli_query($db,$sql2);
        $fila = mysqli_fetch_assoc($res2);
        if($fila){
            $p->setnombreusuario($fila['nombreusuario']);
            $p->setcorreo($fila['correo']);
            $p->setcontrasenia($fila['contrasenia']);
            $p->setrol($fila['rol']);
            $p->settelefono($fila['telefono']);
            $p->setdireccion($fila['direccion']);
            $p->setnick($fila['nick']);
            $p->seturlfoto($fila['urlfoto']);
        }
        else{
            $p->setcorreo(NULL);
        }
        return $p;
    }

    public function insertaUsuario($emailS,$passwordS,$nombre,$nick, $telefono,$direccion,$urlfoto){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $passwordS = password_hash($passwordS, PASSWORD_BCRYPT, [rand()]);
        if($telefono == ''){
            $telefono = 0;
        }
        $sql = "INSERT INTO usuario (correo, contrasenia,nombreusuario,nick,telefono,direccion, urlfoto) VALUES ('$emailS','$passwordS','$nombre','$nick', '$telefono', '$direccion', '$urlfoto')";
        return mysqli_query($db,$sql);
    }

    public function update($emailS,$nombre,$nick, $telefono,$direccion){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $sql = "UPDATE usuario set nombreusuario = '$nombre' ,nick = '$nick'
        , telefono = '$telefono', direccion='$direccion' where correo = '$emailS'";
        return mysqli_query($db,$sql);
    }

    public function updateurl($emailS,$url){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $sql = "UPDATE usuario set urlfoto = '$url' where correo = '$emailS'";
        return mysqli_query($db,$sql);
    }

    public function updatecontrasenia($emailS,$passwordS){
        //por defecto se iserta como usuario registrado
        $db = getConexionBD();
        $passwordS = password_hash($passwordS, PASSWORD_BCRYPT, [rand()]);
        $sql = "UPDATE usuario set contrasenia='$passwordS' where correo = '$emailS'";
        return mysqli_query($db,$sql);
    }

    public function contraseniasCoinciden($contra1, $contra2){
        return $contra1==$contra2;
    }

    public function delete($email){
        $db = getConexionBD();
        $query="DELETE FROM usuario WHERE correo='$email'";
        $res=mysqli_query($db, $query);
        if($res){
            return true;
        }
        return false;
    }

    public function getAllUsuarios($correo){
        $db = getConexionBD();
        $sql = "SELECT * FROM usuario WHERE correo != '$correo'"; //WHERE correo!='$correo'
        $res = mysqli_query($db,$sql);
        $allUsuarios = array();
        $i = 0;
        
        while($row = mysqli_fetch_assoc($res)) {
            $usuario = new Usuario();
            $usuario->setnombreusuario($row['nombreusuario']);
            $usuario->setcorreo($row['correo']);
            $usuario->setcontrasenia($row['contrasenia']);
            $usuario->setrol($row['rol']);
            $usuario->settelefono($row['telefono']);
            $usuario->setdireccion($row['direccion']);
            $usuario->setnick($row['nick']);
            $usuario->seturlfoto($row['urlfoto']);
            $allUsuarios[$i] = $usuario;
            $i += 1;
        }
        return $allUsuarios;
    }
}
?>