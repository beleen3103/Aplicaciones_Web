<div id="header">
    <div id="menu">
        <div id="logo">
            <!-- Logo -->
            <p><a href="index.php"><img src="img/logo2.png" alt="logo"></a></p>
        </div>
        <div id="titulo">
            <h1><a href="index.php">Madrid Mad Tour</a></h1>
            <h4>“Si quieres rutas con glamour, ven a Madrid Mad Tour”</h4>
        </div>
        <div id="opciones">
            <!-- Login o logout-->
            <?php
                if(!isset($_SESSION['login']) || !$_SESSION['login']){ //si el usuario no esta logeado
            ?>

            <div class="ops-v">
                <a class="ops" href="login.php">
                <p><svg xmlns="http://www.w3.org/2000/svg" class="iconos" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg></p>
                <p>Log in</p>
                </a>
            </div>

            <div class="ops-v">
                <a class="ops" href="registro.php">    
                <p><svg xmlns="http://www.w3.org/2000/svg" class="iconos" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g></svg></p>
                <p>Sign up</p>
                </a>
            </div>            
            <?php
                }
                else {
            ?>
                    <div class="ops-v">
                        <a class="ops" href="logout.php">
                        <p><svg xmlns="http://www.w3.org/2000/svg" class="iconos" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g></svg></p>
                        <p>Log out</p>
                        </a>
                    </div>
                    <div class="ops-v">
                        <a class="ops" href="perfil.php">
                        <p><svg xmlns="http://www.w3.org/2000/svg" class="iconos" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg></p>
                        <?php
                        if($_SESSION["nick"]!=''){
                            echo '<p>'.$_SESSION["nick"].'</p>';
                        }
                        else{
                            echo '<p>'.$_SESSION["email"].'</p>';
                        }
                        ?>
                        </a>
                    </div>
                    <div class="ops-v">
                        <a class="ops" href="carrito.php">
                        <p><svg xmlns="http://www.w3.org/2000/svg" class="iconos" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg></p>
                        <p>Carrito</p>
                        </a>
                    </div>
                    <!--Puntos de la aplicacion, ffavs, carrito-->
            <?php
                }
            ?>
            
        </div>
    </div>
    <div id="menu2">
        <nav>
            <ul>
                <li><a href="tienda.php">Tours</a></li>
                <li><a href="novedades.php">Novedades</a></li>
                <li><a href="foro.php">Foro</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>

    </div>
</div>