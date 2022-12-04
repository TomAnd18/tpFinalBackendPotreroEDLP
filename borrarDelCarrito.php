<?php
session_start();

$id=$_GET['id'];

$carro=$_SESSION['carro'];

unset($carro[md5($id)]);

$_SESSION['carro']=$carro;

echo sizeof($carro);
?>