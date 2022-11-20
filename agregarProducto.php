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

    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $talle = $_POST['talle'];
    $precio = $_POST['precio'];
    $genero = $_POST['genero'];
    $stock = $_POST['stock'];
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $favorito = 'false';

    $consulta = "INSERT INTO ropa (id, tipo, marca, talle, precio, genero, stock, favorito, imagen_one, imagen_two)
          VALUES ('','$tipo','$marca','$talle','$precio','$genero','$stock','$favorito','$foto','$imagen')";

    mysqli_query($conexion,$consulta);

    //rederigir a index
    header('location: tableDatos.php');
?>