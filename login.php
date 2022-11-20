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
    <!-- LINK DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="shortcut icon" href="./img/tiendaOnline.png">

    <title>Tienda Online Login</title>
</head>
<body>
    
    <section class="vh-100" style="background: linear-gradient(#00B6FA, #fff, #fff, #00B6FA);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="./img/imgLoginx8.jpg"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 800px" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <form method="post" action="">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">INGRESAR</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">¡Accede a tu cuenta para poder hacer compras!</h5>

                            <div class="form-outline mb-4">
                                <input name="usuario" type="email" id="form2Example17" class="form-control form-control-lg" maxlength="20" required/>
                                <label class="form-label" for="form2Example17">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" maxlength="6" required required/>
                                <label class="form-label" for="form2Example27">Contraseña</label>
                            </div>

                            <?php
                                include("./controladorLogin.php");
                            ?>

                            <div class="pt-1 mb-4">
                                
                                <input name="btningresar" class="btn btn-dark btn-lg btn-block" type="submit" value="Login">
                                <a href="./index.php" style="color:#fff; text-decoration: none;"><button class="btn btn-dark btn-lg btn-block" type="button"> Cancelar </button></a>
                                <!-- <button class="btn btn-dark btn-lg btn-block" type="button"> <a href="./index.php" style="color:#fff; text-decoration: none;">Cancelar</a> </button> -->
                            </div>

                            <a class="small text-muted" href="#!">¿Olvidaste tu contraseña?</a>
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tenes cuenta? <a href="./index.php"
                                style="color: #393f81;">Registrate aqui</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>
                            </form>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- LINK DE JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>