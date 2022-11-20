<?php
  session_start();
  error_reporting(0);

  if($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("location:login.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/allProductosStyle.css">
    <link rel="stylesheet" href="./style/styleProductosAdmin.css">
    
    <!-- LINK DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- ICONOS -->
    <script src="https://kit.fontawesome.com/6c1a9b5729.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="./img/tiendaOnline.png">

    <title>Perfil</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <div class="img-name-tittle">
                <div class="img-tittle">
                    <a href="./allProductos.php"> <img src="./img/tiendaOnline.png" alt="Tienda Tomas"> </a>
                </div>
                <div class="name-tittle">
                    <a href="./allProductos.php">TIENDA FUTBOL</a>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="justify-content: flex-end;" class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#!"> <img width="27px" src="./img/anadir-al-carritoo.png" alt=""> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"> <img width="27px" src="./img/boton-de-inicio.png" alt="Home"> INICIO</a>
                    </li>
                    <?php
                      
                      $sesion = $_SESSION;

                        if($_SESSION['user'] == 'tom@gmail') {
                          echo '
                            <li class="nav-item">
                              <a style="text-transform: uppercase;" class="nav-link" href="./profile.php"> <img width="25px" src="./img/usuariox2.png" alt="User"> '. $_SESSION["user"] .'</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="./tableDatos.php"> <img width="32px" src="./img/apoyo.png" alt="Admin"> ADMINISTRADOR </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="./logout.php"> <img width="29px" src="./img/cerrar-sesion.png" alt="Logout"> CERRAR SESION </a>
                            </li>
                          ';
                        } else {
                          echo '
                            <li class="nav-item">
                              <a style="text-transform: uppercase;" class="nav-link" href="./profile.php"> <img width="25px" src="./img/usuariox2.png" alt="User"> '. $_SESSION["user"] .'</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="./logout.php"> <img width="29px" src="./img/cerrar-sesion.png" alt="Logout"> CERRAR SESION </a>
                            </li>
                          ';
                        }
                      ?>
                </ul>
            </div>
        </div>
    </nav>


    <?php
      include './conexionBD.php';
      $user = $_SESSION["user"];

      $consulta = "SELECT * FROM usuarios WHERE email='$user' ";
      $datos = mysqli_query($conexion, $consulta);
      $dataUser = mysqli_fetch_array($datos);
    ?>
    
    
    <div class="profile-container-global">
        <div class="profile-container">
            <div class="datos-titulo-user"> 
                <div><p class="text-uppercase">DATOS DE MI CUENTA <?php if($dataUser['email'] == 'tom@gmail') { echo '(ADMIN)'; } ?> </p></div>
            </div>
            <div class="datos-user"> 
                <div><p class="text-uppercase">#ID :</p></div> <?php echo '<div> <p class="text-uppercase">',$dataUser['id'],'</p> </div>'; ?>
            </div>
            <div class="datos-user"> 
                <div><p class="text-uppercase">NOMBRE :</p></div> <?php echo '<div> <p class="text-uppercase">',$dataUser['user'],'</p> </div>'; ?>
            </div>
            <div class="datos-user"> 
                <div><p class="text-uppercase">APELLIDO :</p></div> <?php echo '<div> <p class="text-uppercase">',$dataUser['surname'],'</p> </div>'; ?>
            </div>
            <div class="datos-user"> 
                <div><p class="text-uppercase">EMAIL :</p></div> <?php echo '<div> <p class="text-uppercase">',$dataUser['email'],'</p> </div>'; ?>
            </div>
            <div class="datos-user"> 
                <div><p class="text-uppercase">CONTRASEÑA :</p></div> <?php echo '<div> <p class="text-uppercase">',$dataUser['password'],'</p> </div>'; ?>
            </div>
            <div class="update-datos-profile">
                <div>
                    <a class="nav-link" aria-current="page" href="#"><button class="btn btn-primary" class="btn-reg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalTom">Modificar Datos</button></a>
                </div>

                <div class="modal fade" id="exampleModalTom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ACTUALIZAR MIS DATOS</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="was-validated" action="./modificarDatosUser.php?id=<?php echo $dataUser['id']; ?>" method="post"  enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="user" class="col-form-label">Nombre</label>
                                <input name="user" type="text" value="<?php echo $dataUser['user']; ?>" class="form-control" id="user" minlength="3" maxlength="20" required>
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="col-form-label">Apellido</label>
                                <input name="surname" type="text" value="<?php echo $dataUser['surname']; ?>" class="form-control" id="surname" minlength="3" maxlength="20" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email</label>
                                <?php
                                    echo '<input name="email" type="text" value="',$dataUser['email'],'" class="form-control" id="email" minlength="3" maxlength="20" readonly>';
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col-form-label">Contraseña</label>
                                <input name="password" type="text" value="<?php echo $dataUser['password']; ?>" class="form-control" id="password" minlength="6" maxlength="6" required>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    <?php include("./footer.php"); ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./script/confirmarDeleteProducto.js"></script>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
</body>
</html>