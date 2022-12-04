<html>
<head>
  
</head>
<body>
    
        <?php
          session_start();

          if(isset($_SESSION['carro'])) {
            $carro=$_SESSION['carro'];
          } else {
            $carro=false;
          } 
          

          include './conexionBD.php';

          $filtro = $_POST['filter'];

          if($filtro == 'todos') {
              $consulta = 'SELECT * FROM ropa';
              $datos = mysqli_query($conexion, $consulta); ?>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
              </nav>
        <?php } ?>

        <?php  
          if($filtro == 'hombre' || $filtro == 'mujer') {
            $consulta = "SELECT * FROM ropa WHERE genero = '$filtro'";
            $datos = mysqli_query($conexion, $consulta); ?>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./tiendaFutbol.php">Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $filtro; ?></li>
              </ol>
            </nav>
        <?php } ?>

        <?php
          if($filtro == 'adidas' || $filtro == 'nike') {
            $consulta = "SELECT * FROM ropa WHERE marca = '$filtro'";
            $datos = mysqli_query($conexion, $consulta); ?>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./tiendaFutbol.php">Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $filtro; ?></li>
              </ol>
            </nav>
        <?php } ?>

        <?php
          if($filtro == 'DESC' || $filtro == 'ASC') {
            $consulta = "SELECT * FROM ropa ORDER BY precio $filtro";
            $datos = mysqli_query($conexion, $consulta); ?>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./tiendaFutbol.php">Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo 'ordenado'; ?></li>
              </ol>
            </nav>
        <?php } ?>

        <div class="productosTwo">
          
          <?php while(  $prenda = mysqli_fetch_array($datos) ) { ?>
            
            <div class="card">
              <img src=" data:image/png;base64, <?php echo base64_encode($prenda['imagen_one'])?> " class="card-img-top" alt="prenda">
              <img src=" data:image/png;base64, <?php echo base64_encode($prenda['imagen_two'])?> " class="card-img-top" id="imgTwo" alt="prenda">
              <i id="btn-favorite-one" class="fa-regular fa-heart"></i>
              <i id="btn-favorite-two" class="fa-solid fa-heart"></i> 
              <div class="card-body">
                  <h5 class="card-title"> <?php echo "$",number_format($prenda['precio'], 2, ",", ".") ?> </h5>
                  <p class="card-text"> <?php echo $prenda['tipo'].' '.$prenda['marca'] ?> </p>
              </div>
              <div class="talle-genero">
                <p class="card-text"> <?php echo $prenda['genero'].' - '.$prenda['talle'] ?> </p>
              </div>
              <div id="optionCard<?php echo $prenda['id']; ?>" style="display: flex;justify-content: space-around;" class="card-body">
                <?php if($prenda['stock'] != 0) { ?>
                    
                    <?php 
                      if($_SESSION == null || $_SESSION == '') {
                        
                        if(!$carro || !isset($carro[md5($prenda['id'])]['identificador']) || $carro[md5($prenda['id'])]['identificador']!=md5($prenda['id'])){ ?>
                          <a ><button onclick="showMensajeControlCompras();" class="add-touch"> Agregar al carrito <img id="carrito" src="./img/anadir-al-carritoo.png" alt="Add Producto"> </button></a>
                        <?php  } else { ?>
                          <a ><button onclick="showMensajeControlCompras();" class="add-touch" > Quitar del carrito <img id="carrito" src="./img/eliminar-carrito.png" alt="Add Producto"> </button></a>
                        <?php }

                    } else { ?>
                      <?php if(!$carro || !isset($carro[md5($prenda['id'])]['identificador']) || $carro[md5($prenda['id'])]['identificador']!=md5($prenda['id'])){ ?>
                        <a onclick="showAddCountCarritoAndBTN(<?php echo $prenda['id']; ?>);"><button class="add-touch"> Agregar al carrito <img id="carrito" src="./img/anadir-al-carritoo.png" alt="Add Producto"> </button></a>
                      <?php  } else { ?>
                        <a onclick="showDeleteCountCarritoAndBTN(<?php echo $prenda['id']; ?>);"><button class="add-touch" > Quitar del carrito <img id="carrito" src="./img/eliminar-carrito.png" alt="Add Producto"> </button></a>
                      <?php }?>
                    <?php } ?>

                <?php } else { ?>
                    <a><button style="color: red; font-weight: bold;"> Sin Stock </button></a>
                <?php } ?>
              </div>
          </div>
          
        <?php } ?>
      </div>

      <script src="./script/conexionAjax.js"></script>
</body>
</html>