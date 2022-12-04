<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./style/allProductosStyle.css">
    <link rel="stylesheet" href="./style/styleProductosAdmin.css">
    <title></title>
</head>
<body>
    <?php
        session_start();

        $id=$_GET['id'];
        
        $carro=$_SESSION['carro'];
        
        unset($carro[md5($id)]);
        
        $_SESSION['carro']=$carro;

        
     if($carro){ ?>
        <div class="precioFinal-container">
            <p><?php echo sizeof($carro),' '; ?>PRODUCTOS EN EL CARRITO</p>
            <i style="font-size: 1.4rem; color: #fff;" class="fa-solid fa-cart-shopping"></i>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Producto</th>
                <th class="mostrar-r" scope="col">Tipo</th>
                <th class="mostrar-r" scope="col">Marca</th>
                <th class="mostrar-r" scope="col">Talle</th>
                <th scope="col">Precio</th>
                <th class="mostrar-r" scope="col">Genero</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                    
                    $precioTotal = 0;
                    $subtotal = 0;

                    foreach($carro as $k => $v){
                            $subtotal = $v['precio']*$v['cantidad'];
                            $precioTotal = $precioTotal + $subtotal;
                            
                ?>
                    <tr>
                        <td class="container-imgCarrito"> <img src=" data:image/png;base64, <?php echo base64_encode($v['imagen'])?>" alt=""> </td>
                        <td class="mostrar-r"><?php echo $v['tipo']?></td>
                        <td class="mostrar-r"><?php echo $v['marca']?></td>
                        <td class="mostrar-r"><?php echo $v['talle']?></td>
                        <td><?php echo "$ ",number_format($v['precio'], 2, ",", ".") ?></td>
                        <td class="mostrar-r"><?php echo $v['genero']?></td>
                        <td>
                            <select onchange="updateCantidad(<?php echo $v['id']?>,this.value);" style="width: 4rem;" class="form-select" aria-label="Default select example">
                                <?php if($v['stock'] >= 5) {
                                    for($i=1;$i<=5;$i++) { ?>
                                        <option <?php if($v['cantidad'] == $i) { echo 'selected'; } ?> value=<?php echo $i; ?>> <?php echo $i; ?> </option>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php for($i=1;$i<=$v['stock'];$i++) { ?>
                                        <option <?php if($v['cantidad'] == $i) { echo 'selected'; } ?> value=<?php echo $i; ?>> <?php echo $i; ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a><button onclick="deleteDesdeCarrito(<?php echo $v['id']; ?>);" class="btnTable"> <img width="20px" id="imgadddelete" src="./img/boton-x.png" alt="Eliminar Prenda"> </button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="precioFinal-container">
            <p id="precioF"><?php echo "Precio Total : $ ",number_format($precioTotal, 2, ",", ".") ?></p>
        </div>

        <div class="btns-carrito">
            <a class="seguir-compra" href="./tiendaFutbol.php"><button type="button" id="btn-seguir" class="btn btn-primary"> Seguir Comprando </button></a> 
            <a class="seguir-compra" onclick="showDatosPagar();"><button type="button" id="btn-finalizar" class="btn btn-success"> Finalizar Compra </button></a>
        </div>

        <?php } else{ ?>
        <div id="carrito-vacio" class="alert alert-warning" role="alert">
            <p>CARRITO VACIO</p> 
            <img width="25px" src="./img/carro-vacio-buy.png" alt="carrito vacio">
        </div>
        <a class="buy-carrito-container" href="./tiendaFutbol.php"><button type="button" id="btn-buy-carrito" class="btn btn-primary"> Comprar Ahora </button></a> 
    <?php } ?>
</body>
</html>