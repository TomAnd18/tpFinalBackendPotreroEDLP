<?php
    session_start();
    error_reporting(0);
  
    if($_SESSION['user'] == null || $_SESSION['user'] == '') {
      header("location:index.php");
      die();
    }
    if($_SESSION['user'] != null || $_SESSION['user'] != '') {
      if($_SESSION['user'] != 'tom@gmail') {
        header("location:index.php");
        die();
      }
    }

    include './conexionBD.php';

    $id = $_GET['id'];

    $consulta = "DELETE FROM `ropa` WHERE `id`=$id";

    mysqli_query($conexion, $consulta);

    header('location: admin.php');
?>