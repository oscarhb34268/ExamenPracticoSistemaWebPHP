<?php
include("../Modelo/conexionBD.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM productos  WHERE id='$id'";
$query=mysqli_query($con,$sql);
echo "<script>location.href='../index.php'</script>";

?>