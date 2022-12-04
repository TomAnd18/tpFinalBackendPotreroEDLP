<html>
<body>
    <div class="productosTwo">
    <?php 
        include './conexionBD.php';

        $filtro = $_POST['filter'];

        $consulta = 'SELECT * FROM ropa';
        $datos = mysqli_query($conexion, $consulta);
    
        while(  $prenda = mysqli_fetch_array($datos) ) { ?>    
                
            <div class="card">
                <img src=" data:image/png;base64, <?php echo base64_encode($prenda['imagen_one'])?> " class="card-img-top" alt="prenda">
                <img src=" data:image/png;base64, <?php echo base64_encode($prenda['imagen_two'])?> " class="card-img-top" id="imgTwo" alt="prenda">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo "$",number_format($prenda['precio'], 2, ",", ".")?> </h5>
                    <p class="card-text"> <?php echo $prenda['tipo'].' '.$prenda['marca'] ?> </p>
                </div>
                <div class="talle-genero">
                    <p class="card-text"> <?php echo $prenda['genero'].' - '.$prenda['talle'] ?> </p>
                </div>
                <div class="talle-generox2">
                    <p class="card-text"> <?php echo $prenda['stock']." unidades" ?> </p>
                </div>
                <div style="display: flex;justify-content: space-around;" class="card-body">
                    <a href="./editar.php?id=<?php echo $prenda['id'];?>"><button> <img src="./img/actualizar.png" alt="Actualizar Prenda"></button></a>
                    <a onclick="confirmarDelete(<?php echo $prenda['id'];?>);" ><button> <img src="./img/eliminar.png" alt="Eliminar Prenda"> </button></a>
                </div>
            </div>
  
    <?php } ?>
    </div>
    
</body>
</html>