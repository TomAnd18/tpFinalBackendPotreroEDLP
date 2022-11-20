<?php
    session_start();
    error_reporting(0);
  
    if($_SESSION['user'] == null || $_SESSION['user'] == '') {
      header("location:index.php");
      die();
    }

    include './conexionBD.php';

    $id = $_GET['id'];
    $user = $_POST['user'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "UPDATE usuarios SET user='$user', surname='$surname', email='$email', password='$password' WHERE id = $id";

    mysqli_query($conexion,$consulta);

    header('location: profile.php');
?>