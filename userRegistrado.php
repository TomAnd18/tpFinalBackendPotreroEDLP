<?php
  session_start();
  error_reporting(0);

  if($_SESSION['user'] != null || $_SESSION['user'] != '') {
    header("location:index.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">

    <!-- ICONOS -->
    <script src="https://kit.fontawesome.com/6c1a9b5729.js" crossorigin="anonymous"></script>

    <!-- LINK DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="shortcut icon" href="./img/tiendaOnline.png">

    <title>Tienda Online</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <div class="img-name-tittle">
                <div class="img-tittle">
                    <a href="./allProductos.php"> <img src="./img/tiendaOnline.png" alt="Tienda Tomas"> </a>
                </div>
                <div class="name-tittle">
                    <a href="./allProductos.php">Tienda Futbol</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <button class="btn-reg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img width="24px" src="./img/user_add.png" alt="Add User"> REGISTRARSE</button> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php"> <img width="29px" src="./img/login.png" alt="Login"> INGRESAR</a>
                    </li>
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
                <form action="registrarse.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="col-form-label">Apellido</label>
                        <input name="apellido" type="text" class="form-control" id="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="col-form-label">Contraseña</label>
                        <input name="contraseña" type="password" class="form-control" id="contraseña" maxlength="6" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
            </div>
            
          </div>
        </div>
    </div>

    <div>
        <?php
            echo '<div style="display: flex;justify-content: center;" class="alert alert-danger" role="alert"> EL EMAIL YA ESTA REGISTRADO EN EL SISTEMA </div>';
        ?>
    </div>

    <section>
        <div class="buynow-container">
            <a href="./allProductos.php"> <button>Comprar Ahora <img src="./img/avance-rapido.png" alt="Buy Now"></button> </a>
        </div>
    </section>

    <?php include("./footer.php"); ?>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</body>
</html>