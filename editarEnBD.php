<?php
    include './conexionBD.php';

    $id = $_GET['id'];

    $tipo = $_POST ["tipo"];
    $marca = $_POST ["marca"];
    $talle = $_POST ["talle"];
    $precio = $_POST ["precio"];
    $genero = $_POST ["genero"];
    $stock = $_POST ["stock"];

    if($_FILES['foto']['name'] != null && $_FILES['imagen']['name'] == null) {
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $consulta = "UPDATE ropa SET tipo='$tipo', marca='$marca', talle='$talle', precio='$precio', genero='$genero', stock='$stock', imagen_one='$foto' WHERE id = $id";
    }

    if($_FILES['foto']['name'] == null && $_FILES['imagen']['name'] != null) {
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $consulta = "UPDATE ropa SET tipo='$tipo', marca='$marca', talle='$talle', precio='$precio', genero='$genero', stock='$stock', imagen_two='$imagen' WHERE id = $id";
    }

    if($_FILES['foto']['name'] != null && $_FILES['imagen']['name'] != null) {
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $consulta = "UPDATE ropa SET tipo='$tipo', marca='$marca', talle='$talle', precio='$precio', genero='$genero', stock='$stock', imagen_one='$foto', imagen_two='$imagen' WHERE id = $id";
    }

    if($_FILES['foto']['name'] == null && $_FILES['imagen']['name'] == null) {
        $consulta = "UPDATE ropa SET tipo='$tipo', marca='$marca', talle='$talle', precio='$precio', genero='$genero', stock='$stock' WHERE id = $id";
    }

    mysqli_query($conexion,$consulta);

    header('location: tableDatos.php');
?>