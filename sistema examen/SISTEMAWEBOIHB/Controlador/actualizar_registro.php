<?php

include("../Modelo/conexionBD.php");
$con = conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$tipo = $_POST['tipo'];

// Modifica la consulta para actualizar el campo tipo_id en lugar de tipo
$sql = "UPDATE productos SET nombre='$nombre', cantidad='$cantidad', tipo_id='$tipo' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: ../index.php");
}
?>
