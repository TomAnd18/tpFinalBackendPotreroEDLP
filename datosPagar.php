<?php
    session_start();

    // if(!isset($_SESSION['factura'])) {
    //     $factura = 'factura';
    //     $_SESSION["factura"] = $factura;
    // }

    $carro=$_SESSION['carro'];

    $precioTotal = 0;
    foreach($carro as $k => $v) {
        $precioTotal += $v['precio']*$v['cantidad'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
</head>
<body>
    <div class="pagar-container">
        <div class="btn-volver-container">
            <div onclick="showProductosCarrito();" class="btn-volver">
                <img width="35px" src="./img/volver-flecha.png" alt="Volver">
            </div>
        </div>
        <div class="precioFinal-container">
            <p>PAGAR COMPRA</p>
        </div>
        <form action="./factura.php" method="POST" class="inputs-pagar">
            <div>
                <input style="display: none;" value="1" name="id" type="text">
            </div>
            <div class="form-floating mb-3">
                <input name="nombre" type="text" class="form-control" id="floatingInput" required maxlength="25" placeholder="name@example.com">
                <label for="floatingInput">Nombre completo</label>
            </div>
            <div class="form-floating mb-3">
                <input name="direccion" type="text" class="form-control" id="floatingInput" required maxlength="15" placeholder="name@example.com">
                <label for="floatingInput">Direccion de envio</label>
            </div>
            <div class="datos-ciudad">
                <div style="width: 45%;" class="form-floating mb-3">
                    <input name="tarjeta" type="text" class="form-control" id="floatingInput" required maxlength="10" placeholder="name@example.com">
                    <label for="floatingInput">Numero de tarjeta</label>
                </div>
                <div style="width: 45%;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1"> <i style="font-size: 1.5rem;" class="fa-brands fa-cc-visa"></i> Visa</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2"> <i style="font-size: 1.5rem;" class="fa-brands fa-cc-mastercard"></i> Mastercard</label>
                    </div>
                </div>
            </div>
            <div class="datos-ciudad">
                <div id="ciudad-container" class="form-floating mb-3">
                    <input name="ciudad" type="text" class="form-control" id="floatingInput" required maxlength="15" placeholder="name@example.com">
                    <label for="floatingInput">Ciudad</label>
                </div>
                <div id="codigo-postal-container" class="form-floating mb-3">
                    <input name="codpostal" type="text" class="form-control" id="floatingInput" required maxlength="4" placeholder="name@example.com">
                    <label for="floatingInput">Codigo Postal</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" maxlength="40" placeholder="name@example.com"></input>
                <label for="floatingTextarea">Descripcion del domicilio (Opcional)</label>
            </div>
            <div style="margin-top: 2rem;">
                <a class="buy-carrito-container" href="#!"><button type="submit" id="btn-buy-carrito" class="btn btn-primary">Pagar <?php echo ' $ ',number_format($precioTotal, 2, ",", "."); ?></button></a> 
            </div>
        </form>
    </div>
</body>
</html>