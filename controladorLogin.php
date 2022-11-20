<?php
    session_start();
    error_reporting(0);

    if($_SESSION['user'] != null || $_SESSION['user'] != '') {
        header("location:index.php");
        die();
    }

    include("./conexionBD.php");
    if(!empty($_POST["btningresar"])) {
        if(empty($_POST["usuario"]) and empty($_POST["password"])) {
            echo '<div style="display: flex;justify-content: center;" class="alert alert-danger" role="alert"> Complete los campos </div>';
        } else {
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $sql = $conexion->query(" select * from usuarios where email='$usuario' and password='$password'");
            if($datos=$sql->fetch_object()) {
                
                $_SESSION["user"] = $usuario;

                $consulta = "UPDATE `usuarios` SET `active` = 'true' WHERE `usuarios`.`email` = '$usuario'";
                mysqli_query($conexion,$consulta);

                header("location:index.php");
                
            } else {
                echo '<div style="display: flex;justify-content: center;" class="alert alert-danger" role="alert"> Email o contraseña incorrecta </div>';
            }
        }
    }
?>