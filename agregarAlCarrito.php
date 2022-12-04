<?php
session_start();

$id=$_POST['id'];

include './conexionBD.php';

if(!isset($cantidad)){
    $cantidad=1;
}

$consulta="SELECT * FROM ropa WHERE id= $id";

$datos= mysqli_query($conexion, $consulta);

$reg = mysqli_fetch_array($datos);

if(isset($_SESSION['carro'])) {
    $carro=$_SESSION['carro'];
}

$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'id'=>$id,'imagen'=>$reg['imagen_one'],'tipo'=>$reg['tipo'],'marca'=>$reg['marca'],'talle'=>$reg['talle'],'precio'=>$reg['precio'],'genero'=>$reg['genero'],'stock'=>$reg['stock']);

$_SESSION['carro']=$carro;

echo sizeof($carro);

?>