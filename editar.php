<?php
  session_start();
  error_reporting(0);

  if($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("location:index.php");
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

    <?php
        include './conexionBD.php';

        $id = $_GET['id'];

        $consulta = "SELECT * FROM ropa WHERE id = $id";

        $respuesta = mysqli_query($conexion, $consulta);
        $datos = mysqli_fetch_array($respuesta);

    ?>

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

    <?php
        $tipo = $datos['tipo'];
        $marca = $datos['marca'];
        $talle = $datos['talle'];
        $precio = $datos['precio'];
        $genero = $datos['genero'];
        $stock = $datos['stock'];
        // $favorito = $datos['favorito'];
        $imagen_one= $datos['imagen_one'];
        $imagen_two = $datos['imagen_two'];
    ?>
    
    <div class="container-global-form">
        <div  class="form-container">
            <form action="./editarEnBD.php?id=<?php echo $id;?>" method="post"  enctype="multipart/form-data"class="row g-3">
                <h1 style="text-align: center;" class="modal-title fs-5" id="exampleModalLabel">ACTUALIZAR PRODUCTO <?php echo "ID $id"; ?></h1>
                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input name="tipo" type="text" class="form-control" id="tipo" value="<?php echo "$tipo"; ?>" maxlength="10" required>
                </div>
                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input name="marca" type="text" class="form-control" id="marca" value="<?php echo "$marca"; ?>" maxlength="10" required>
                </div>
                <div class="col-md-6">
                    <label for="talle" class="form-label">Talle</label>
                    <input name="talle" type="text" class="form-control" id="talle" value="<?php echo "$talle"; ?>" maxlength="4" required>
                </div>
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="number" class="form-control" id="precio" value="<?php echo "$precio"; ?>" max="50000" required>
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label">Genero</label>
                    <input name="genero" type="text" class="form-control" id="genero" value="<?php echo "$genero"; ?>" maxlength="10" required>
                </div>
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="number" class="form-control" id="stock" value="<?php echo "$stock"; ?>" max="100" required>
                </div>

                <div class="show-img">
                  <div class="show-img-one">
                      <h3>Imagen 1</h3>
                      <img width="200px" src=" data:image/png;base64, <?php echo base64_encode($imagen_one)?> " alt="Imagen One">

                      <div style="display: flex;justify-content: space-between;" class="mb-3">
                        <div>
                          <label class="form-label">Cambiar foto 1(OPCIONAL)</label> 
                          <input class="form-control" type="file" name="foto">
                        </div>
                      </div>

                  </div>
                  <div class="show-img-one">
                    <h3>Imagen 2</h3>
                    <img width="200px" src=" data:image/png;base64, <?php echo base64_encode($imagen_two)?> " alt="Imagen Two">
                    <div style="display: flex;justify-content: space-between;" class="mb-3">
                      <div>
                        <label class="form-label">Cambiar foto 2(OPCIONAL)</label> 
                        <input class="form-control" type="file" name="imagen" >
                      </div>
                    </div>
                  </div>
                </div>

                <div style="text-align: center;" class="col-12">
                    <button style="text-transform: uppercase;" type="submit" class="btn btn-primary">ACTUALIZAR</button>
                    <a style="color: #fff;text-decoration: none;" href="./tableDatos.php"><button style="text-transform: uppercase;" type="button" class="btn btn-primary">CANCELAR</button></a>
                </div>
            </form>
        </div>
    </div>

    <?php include("./footer.php"); ?>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
</body>
</html>