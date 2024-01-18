<?php
include("conexionBD.php");
$con=conectar();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];
$tipo=$_POST['tipo'];


$sql="INSERT INTO productos VALUES('$id','$nombre','$cantidad','$tipo')";
$query=mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>