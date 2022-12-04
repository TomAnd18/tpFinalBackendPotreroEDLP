<?php
    session_start();

    $id = $_GET['id'];
    $value = $_GET['value'];
    
    $carro = $_SESSION['carro'];
    
    $carro[md5($id)]['cantidad'] = $value;
    
    $_SESSION['carro'] = $carro;

    $carro = $_SESSION['carro'];

    $precioTotal = 0;
    $subtotal = 0;
    
    foreach($carro as $k => $v) {
        $subtotal = $v['precio']*$v['cantidad'];
        $precioTotal = $precioTotal + $subtotal;
    }

    echo "Precio final: $ ",number_format($precioTotal, 2, ",", ".");
?>