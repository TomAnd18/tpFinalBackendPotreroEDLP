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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="./img/tiendaOnline.png">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $("#content-register-user").fadeOut(1500);
            },5000);
        });
    </script>

    <title>Productos</title>
</head>
<body onload="showProductos('todos');">
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
                        <a class="nav-link" href="./carrito.php"> <i style="color: #0095ff;" class="fa-solid fa-cart-shopping"></i> <span id="count-carrito">
                          <?php
                            session_start();

                            error_reporting(0);

                            if(isset($_SESSION['carro'])) {
                                $carrito=$_SESSION['carro'];  
                                echo sizeof($carrito);
                            } else {
                                echo 0;
                            }
                          ?>
                        </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"> <i style="color: #0095ff;" class="fa-solid fa-house"></i> INICIO</a>
                    </li>
                    <?php
                      // session_start();
                      $sesion = $_SESSION;

                      if($sesion == null || $sesion == '') {
                        echo '

                        <li class="nav-item">
                            <a class="nav-link"> <button class="btn-reg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i style="color: #0095ff;" class="fa-solid fa-user-plus"></i> REGISTRARSE</button> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php"> <i style="color: #0095ff;" class="fa-solid fa-right-to-bracket"></i> INGRESAR</a>
                        </li>
                        ';
                      } else {
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
                      }
                      ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">REGISTRAR NUEVO USUARIO</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="col-form-label">Apellido</label>
                        <input name="apellido" type="text" class="form-control" id="apellido" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="col-form-label">Contraseña</label>
                        <input name="contraseña" type="password" class="form-control" id="contraseña" minlength="6" maxlength="6" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input name="btnregistrar" class="btn btn-primary" type="submit" value="Registrarse">
                    </div>
                </form>
            </div>
            
          </div>
        </div>
    </div>

    <div class="user-register">
        <?php include("./controlarRegistro.php") ?>
    </div>
    
    <div style="padding-top: 80px;">
      <ul class="nav nav-tabs">
          <li class="nav-item">
            <a onclick="showProductos('todos');" class="nav-link" aria-current="page">Todos</a>
          </li>
          <li class="nav-item">
              <a onclick="showProductos('hombre');" class="nav-link">Hombre</a>
          </li>
          <li class="nav-item">
              <a onclick="showProductos('mujer');" class="nav-link">Mujer</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Marca</a>
            <ul class="dropdown-menu">
              <li><a onclick="showProductos('adidas');" class="dropdown-item">Adidas</a></li>
              <li><a onclick="showProductos('nike');" class="dropdown-item">Nike</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Precio</a>
              <ul class="dropdown-menu">
                <li><a onclick="showProductos('DESC');" class="dropdown-item">Mayor a menor</a></li>
                <li><a onclick="showProductos('ASC');" class="dropdown-item">Menor a mayor</a></li>
              </ul>
            </li>
        </ul>
    </div>

    <div class="control-compras">
        
    </div>
    
    <div style="display: flex; align-items: center;justify-content: center;padding-top: 2rem;padding-bottom: 2rem;">
        <div class="productos">
        
        </div>
    </div> 

    <?php include("./footer.php"); ?>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

    <script src="./script/conexionAjax.js"></script>
</body>
</html>