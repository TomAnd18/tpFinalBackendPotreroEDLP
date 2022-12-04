<?php
    include("./conexionBD.php");
    
    if(!empty($_POST["btnregistrar"])) {
        if(empty($_POST["nombre"]) and empty($_POST["apellido"]) and empty($_POST["email"]) and empty($_POST["contraseña"])) {
            echo '<div style="display: flex;justify-content: center;" class="alert alert-danger" role="alert"> Complete los campos </div>';
        } else {
            $user = $_POST ["nombre"];
            $surname = $_POST ["apellido"];
            $email = $_POST ["email"];
            $password = $_POST ["contraseña"];

            $consultaONE = "SELECT * FROM usuarios WHERE email = '$email'";
            $datosONE = mysqli_query($conexion, $consultaONE);
            $data = mysqli_fetch_array($datosONE);

            if($data == null || $data == '') {

                $consulta = "INSERT INTO usuarios (id, user, surname, email, password, active)
                    VALUES ('','$user','$surname','$email','$password','')";
            
                mysqli_query($conexion,$consulta);
            
                echo '<div id="content-register-user" style="width: max-content;display: flex;justify-content: center;" class="alert alert-success" role="alert"> USUARIO REGISTRADO CORRECTAMENTE</div>';
            } else {
                echo '<div id="content-register-user" style="width: max-content;display: flex;justify-content: center;" class="alert alert-danger" role="alert"> EL EMAIL YA ESTA REGISTRADO </div>';
            }
        }
    }

?>