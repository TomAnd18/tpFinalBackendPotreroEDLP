<?php
    session_start();

    include("./conexionBD.php");

    $user = $_SESSION['user'];
    
    $consulta = "UPDATE `usuarios` SET `active` = 'false' WHERE `usuarios`.`email` = '$user'";
    mysqli_query($conexion,$consulta);
    header("location:index.php");

    session_destroy();

    header("location:index.php");
?>