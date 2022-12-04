<?php
  session_start();
  error_reporting(0);

  if($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("location:login.php");
    die();
  }
  if($_SESSION['user'] != null || $_SESSION['user'] != '') {
    if($_SESSION['user'] != 'tom@gmail') {
      header("location:index.php");
      die();
    }
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>Admin</title>
</head>
<body onload="showTableProductos('users');">
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
                    <li class="nav-item">
                      <a style="text-transform: uppercase;" class="nav-link" href="./profile.php"> <i style="color: #0095ff;" class="fa-solid fa-user"></i> <?php echo $_SESSION["user"];?></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./admin.php"> <i style="color: #0095ff;" class="fa-sharp fa-solid fa-user-gear"></i> ADMINISTRADOR </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./logout.php"> <i style="color: #0095ff;" class="fa-solid fa-right-from-bracket"></i> CERRAR SESION </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="padding-top: 80px;">
      <ul class="nav nav-tabs">
          <li class="nav-item">
            <a style="margin: 0%; padding: 0%; height: 100%;" class="nav-link" aria-current="page"><button style="color: blue;text-transform: uppercase; height: 100%; padding: 0.5rem 1rem;" class="btn-reg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalTwo">Agregar Producto <img class="img-add" src="./img/agregar.png" alt="Add Producto"></button></a>
            
                      
            <div class="modal fade" id="exampleModalTwo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">REGISTRAR NUEVO PRODUCTO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                      <form class="was-validated" action="./agregarProducto.php" method="post"  enctype="multipart/form-data">
                          <div class="mb-3">
                              <label for="tipo" class="col-form-label">Tipo</label>
                              <input name="tipo" type="text" class="form-control" id="tipo" maxlength="10" required>
                          </div>
                          <div class="mb-3">
                              <label for="marca" class="col-form-label">Marca</label>
                              <input name="marca" type="text" class="form-control" id="marca" maxlength="10" required>
                          </div>
                          <div style="display: flex;justify-content: space-between;" class="mb-3">
                              <div>
                                  <label style="width:40%;" for="talle" class="col-form-label">Talle</label>
                                  <input style="width:80%;" name="talle" type="text" class="form-control" id="talle" maxlength="4" required>
                              </div>
                              <div>
                                  <label style="width:40%;" for="precio" class="col-form-label">Precio</label>
                                  <input style="width:80%;" name="precio" type="number" class="form-control" id="precio" max="50000" required>
                              </div>
                          </div>
                          <div style="display: flex;justify-content: space-between;" class="mb-3">
                              <div>
                                  <label style="width:40%;" for="genero" class="col-form-label">Genero</label>
                                  <input style="width:80%;" name="genero" type="text" class="form-control" id="genero" maxlength="10" required>
                              </div>
                              <div>
                                  <label style="width:40%;" for="stock" class="col-form-label">Stock</label>
                                  <input style="width:80%;" name="stock" type="number" class="form-control" id="stock" max="100" required>
                              </div>
                          </div>
                          <div style="display: flex;justify-content: space-between;" class="mb-3">
                              <div>
                                  <label class="form-label">Imagen 1</label> 
                                  <input class="form-control" type="file" name="foto" required>
                              </div>
                          </div>
                          <div style="display: flex;justify-content: space-between;" class="mb-3">
                              <div>
                                  <label class="form-label">Imagen 2</label> 
                                  <input class="form-control" type="file" name="imagen" required>
                              </div>
                          </div>
                          
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-primary">Agregar</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a style="height: 100%;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">VISTAS</a>
            <ul class="dropdown-menu">
              
              <li> 
                <a class="dropdown-item" onclick="showCardProductos('card');">Card</a>
              </li>
              <li> 
                <a class="dropdown-item" onclick="showTableProductos('table');">Table</a>
              </li>
              <li> 
                <a class="dropdown-item" onclick="showUsers('users');">Users</a>
              </li>

            </ul>
          </li>
      </ul>
    </div>


    



    <?php
      include './conexionBD.php';

      $consulta = 'SELECT * FROM ropa';
      $datos = mysqli_query($conexion, $consulta);
    ?>
   
    <div style="display: flex; align-items: center;justify-content: center;padding-top: 2rem;padding-bottom: 2rem;">            
      <div class="productos">

      </div>
    </div>    

    <?php include("./footer.php"); ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./script/confirmarDeleteProducto.js"></script>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

    <script src="./script/conexionAjax.js"></script>
</body>
</html>