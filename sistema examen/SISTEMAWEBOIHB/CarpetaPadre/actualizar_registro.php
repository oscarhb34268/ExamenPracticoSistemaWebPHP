<?php

include("conexionBD.php");
$con=conectar();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];
$tipo=$_POST['tipo'];


$sql="UPDATE productos SET  nombre='$nombre',cantidad='$cantidad',tipo='$tipo'  WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>