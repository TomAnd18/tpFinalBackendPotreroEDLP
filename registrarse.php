<?php
    $user = $_POST ["nombre"];
    $surname = $_POST ["apellido"];
    $email = $_POST ["email"];
    $password = $_POST ["contraseña"];

    //para no poder acceder a registrarse.php directamente
    if($user == '' || $surname == '' || $email == '' || $password == '') {
        header("location:index.php");
        die();
    }

    include './conexionBD.php';

    $consultaONE = "SELECT * FROM usuarios WHERE email = '$email'";
    $datosONE = mysqli_query($conexion, $consultaONE);
    $data = mysqli_fetch_array($datosONE);

    if($data == null || $data == '') {

        $consulta = "INSERT INTO usuarios (id, user, surname, email, password, active)
              VALUES ('','$user','$surname','$email','$password','')";
    
        mysqli_query($conexion,$consulta);
    
        header('location: userNew.php');
    } else {
        header('location: userRegistrado.php');
    }

?>