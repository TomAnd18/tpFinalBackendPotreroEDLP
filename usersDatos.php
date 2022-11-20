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

    <title>Admin</title>
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
                    <li class="nav-item">
                      <a style="text-transform: uppercase;" class="nav-link" href="./profile.php"> <img width="25px" src="./img/usuariox2.png" alt="User"> <?php echo $_SESSION["user"];?></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./tableDatos.php"> <img width="32px" src="./img/apoyo.png" alt="Admin"> ADMINISTRADOR </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./logout.php"> <img width="29px" src="./img/cerrar-sesion.png" alt="Logout"> CERRAR SESION </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
      <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><button style="color: blue;text-transform: uppercase;" class="btn-reg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalTwo">Agregar Producto <img class="img-add" src="./img/agregar.png" alt="Add Producto"></button></a>
            
                      
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
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">VISTAS</a>
            <ul class="dropdown-menu">
              
              <li> 
                <a class="dropdown-item" href="./admin.php">Card</a>
              </li>
              <li> 
                <a class="dropdown-item" href="./tableDatos.php">Table</a>
              </li>
              <li> 
                <a class="dropdown-item" href="./usersDatos.php">Users</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./usersDatos.php">Refresh</a>
          </li>
      </ul>
    </div>

    <?php
      include './conexionBD.php';

      $consulta = 'SELECT * FROM usuarios';
      $datos = mysqli_query($conexion, $consulta);
    ?>
   
    <div style="display: flex; align-items: center;justify-content: center;padding-top: 2rem;padding-bottom: 2rem;">            
      <div class="productos">
    
    <table style="align-items: center;" class="table">
      <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre</th>
            <th scope="col" class="marca-genero">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Contraseña</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">

        <?php while(  $user = mysqli_fetch_array($datos) ) { ?>    

            <tr>
                <th scope="row"><?php echo $user['id']?></th>
                <td><?php echo $user['user']?></td>
                <td class="marca-genero"><?php echo $user['surname']?></td>
                <td>
                    <?php
                      if($user['active'] == 'true') {
                        if($user['email'] == 'tom@gmail') {
                            echo '<img width="10px" src="./img/circleGreen.png" alt="Online">  '.$user['email'].'(ADMIN)';
                        } else {
                            echo '<img width="10px" src="./img/circleGreen.png" alt="Online">  '.$user['email'];
                        }
                      } else {
                        if($user['email'] == 'tom@gmail') {
                          echo '<img width="10px" src="./img/circleRed.png" alt="Online">  '.$user['email'].'(ADMIN)';
                        } else {
                          echo '<img width="10px" src="./img/circleRed.png" alt="Online">  '.$user['email'];
                        }
                      }
                    ?>
                </td>
                <td><?php echo $user['password']?></td>
            </tr>
            
          <?php } ?>
        </tbody>
      </table>
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