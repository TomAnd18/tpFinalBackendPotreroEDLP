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

    <title>Productos</title>
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
                      session_start();
                      $sesion = $_SESSION;

                      if($sesion == null || $sesion == '') {
                        echo '

                        <li class="nav-item">
                            <a class="nav-link" href="#"> <button class="btn-reg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img width="24px" src="./img/user_add.png" alt="Add User"> REGISTRARSE</button> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php"> <img width="29px" src="./img/login.png" alt="Login"> INGRESAR</a>
                        </li>
                        ';
                      } else {
                        if($_SESSION['user'] == 'tom@gmail') {
                          echo '
                            <li class="nav-item">
                              <a class="nav-link" href="./profile.php"> <img width="25px" src="./img/usuariox2.png" alt="User"> '. $_SESSION["user"] .'</a>
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
                <form action="registrarse.php" method="post">
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
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
            </div>
            
          </div>
        </div>
    </div>
    
    
    <div>
      <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./allProductos.php">Todos</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="./filtros.php?filtro=hombre">Hombre</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="./filtros.php?filtro=mujer">Mujer</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Marca</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./filtros.php?filtro=adidas">Adidas</a></li>
              <li><a class="dropdown-item" href="./filtros.php?filtro=nike">Nike</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Precio</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./filtros.php?filtro=DESC">Mayor a menor</a></li>
                <li><a class="dropdown-item" href="./filtros.php?filtro=ASC">Menor a mayor</a></li>
              </ul>
            </li>
        </ul>
    </div>

    <?php
      include './conexionBD.php';

      $filtro = $_GET['filtro'];

      if($filtro == 'hombre' || $filtro == 'mujer') {
        $consulta = "SELECT * FROM ropa WHERE genero = '$filtro'";
        $datos = mysqli_query($conexion, $consulta);
      } 
      if($filtro == 'adidas' || $filtro == 'nike') {
        $consulta = "SELECT * FROM ropa WHERE marca = '$filtro'";
        $datos = mysqli_query($conexion, $consulta);
      }
      if($filtro == 'DESC' || $filtro == 'ASC') {
        $consulta = "SELECT * FROM ropa ORDER BY precio $filtro";
        $datos = mysqli_query($conexion, $consulta);
      }

    ?>

    <div>
      <ul style="justify-content: center;" class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#!"> 
            <?php 
              if($filtro == 'hombre' || $filtro == 'mujer') {
                echo 'PRODUCTOS PARA ',$filtro;
              } 
              if($filtro == 'adidas' || $filtro == 'nike') {
                echo 'PRODUCTOS ',$filtro;
              }
              if($filtro == 'DESC') {
                echo 'PRODUCTOS DE MAYOR A MENOR';
              }
              if($filtro == 'ASC') {
                echo 'PRODUCTOS DE MENOR A MAYOR';
              }
            ?> 
          </a>
        </li>
      </ul>
    </div>

    <div style="display: flex; align-items: center;justify-content: center;padding-top: 2rem;padding-bottom: 2rem;">
    <div class="productos">
      <?php while(  $prenda = mysqli_fetch_array($datos) ) { ?>

          <div class="card">
            <img src=" data:image/png;base64, <?php echo base64_encode($prenda['imagen_one'])?> " class="card-img-top" alt="prenda">
            <img src=" data:image/png;base64, <?php echo base64_encode($prenda['imagen_two'])?> " class="card-img-top" id="imgTwo" alt="prenda">
            <img id="img-favorite" src="./img/favoritoFalse.png" alt="Favorito">
            <img id="imgfavoritetrue" src="./img/favoritoTrue.png" alt="Favorito">
            <div class="card-body">
                <h5 class="card-title"> <?php echo "$",number_format($prenda['precio'], 2, ",", ".") ?> </h5>
                <p class="card-text"> <?php echo $prenda['tipo'].' '.$prenda['marca'] ?> </p>
            </div>
            <div class="talle-genero">
              <p class="card-text"> <?php echo $prenda['genero'].' - '.$prenda['talle'] ?> </p>
            </div>
            <div style="display: flex;justify-content: space-around;" class="card-body">
              <?php
                if($prenda['stock'] != 0) {
                  echo '<a href="#!"><button> Agregar <img id="carrito" src="./img/anadir-al-carritoo.png" alt="Add Producto"> </button></a>';
                } else {
                  echo '<a href="#!"><button style="color: red; font-weight: bold;"> Sin Stock </button></a>';
                }
              ?>
            </div>
        </div>

      <?php } ?>
    </div>
    </div>     

    <?php include("./footer.php"); ?>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
</body>
</html>