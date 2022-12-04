<?php
  session_start();
  error_reporting(0);

  if($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("location:index.php");
    die();
  }

  if(!isset($_POST['id'])) {
    header("location:index.php");
    die();
  } else {
    $id = $_POST['id'];
  }

  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $tarjeta = $_POST['tarjeta'];
  $ciudad = $_POST['ciudad'];
  $codpostal = $_POST['codpostal'];

  unset($_SESSION['carro']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICONOS -->
    <script src="https://kit.fontawesome.com/6c1a9b5729.js" crossorigin="anonymous"></script>

    <!-- LINK DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="./img/tiendaOnline.png">
    <link rel="stylesheet" href="./style/allProductosStyle.css">
    <link rel="stylesheet" href="./style/styleProductosAdmin.css">

    <title>Factura</title>
</head>
<body>
    <nav style="position: fixed; width: 100vw; z-index: 12;" class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <div class="img-name-tittle">
                <div class="img-tittle">
                    <a href="./tiendaFutbol.php"> <img src="./img/tiendaOnline.png" alt="Tienda Tomas"> </a>
                </div>
                <div class="name-tittle">
                    <a href="./tiendaFutbol.php">TIENDA FUTBOL</a>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="justify-content: flex-end;" class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"> <i style="color: #0095ff;" class="fa-solid fa-house"></i> INICIO</a>
                    </li>
                    <?php
                      
                      $sesion = $_SESSION;

                      
                      if($_SESSION['user'] == 'tom@gmail') {
                        echo '
                          <li class="nav-item">
                            <a class="nav-link" href="./profile.php"> <i style="color: #0095ff;" class="fa-solid fa-user"></i> '. $_SESSION["user"] .'</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="./admin.php"> <i style="color: #0095ff;" class="fa-sharp fa-solid fa-user-gear"></i> ADMINISTRADOR </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="./logout.php"> <i style="color: #0095ff;" class="fa-solid fa-right-from-bracket"></i> CERRAR SESION </a>
                          </li>
                        ';
                      } else {
                        echo '
                          <li class="nav-item">
                            <a style="text-transform: uppercase;" class="nav-link" href="./profile.php"> <i style="color: #0095ff;" class="fa-solid fa-user"></i> '. $_SESSION["user"] .'</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="./logout.php"> <i style="color: #0095ff;" class="fa-solid fa-right-from-bracket"></i> CERRAR SESION </a>
                          </li>
                        ';
                      }
                      
                      ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="thanks-container">
        <div id="thanks" class="lead">
            <p>¡Gracias por su compra!</p>
        </div>
        <div class="img-thanks">
            <img src="./img/gracias.png" alt="">
        </div>
        <div class="mensaje-envio">
            <div style="width: 100%; text-align: center;" class="alert alert-success" role="alert">
                <p class="msg-envio">Gracias <strong><?php echo $nombre; ?></strong> , los productos seran enviados al domicilo <strong><?php echo $direccion,' - ',$ciudad,'(',$codpostal,')'; ?></strong> dentro de las proximas 24hs.</p>
            </div>
        </div>
        <div class="back-container">
            <a class="back-a" href="./tiendaFutbol.php"><button type="button" id="back-tienda" class="btn btn-primary"> Volver a la tienda </button></a> 
        </div>
    </div>

    <?php include("./footer.php"); ?>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
</body>
</html>