<?php
include("../Modelo/conexionBD.php");
$con = conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$tipo = $_POST['tipo'];

// Verificar si el tipo de producto ya existe
$sql_check_tipo = "SELECT id FROM tipoproducto WHERE productotipos = '$tipo'";
$query_check_tipo = mysqli_query($con, $sql_check_tipo);

if (mysqli_num_rows($query_check_tipo) > 0) {
    // Si el tipo existe, obtener su ID
    $row = mysqli_fetch_assoc($query_check_tipo);
    $tipo_id = $row['id'];
} else {
    // Si el tipo no existe, insertarlo y obtener el nuevo ID
    $sql_insert_tipo = "INSERT INTO tipoproducto (productotipos) VALUES ('$tipo')";
    $query_insert_tipo = mysqli_query($con, $sql_insert_tipo);

    // Obtener el nuevo ID insertado
    $tipo_id = mysqli_insert_id($con);
}

// Insertar el producto con el tipo_id obtenido
$sql_insert_producto = "INSERT INTO productos (id, nombre, cantidad, tipo_id) VALUES ('$id', '$nombre', '$cantidad', '$tipo_id')";
$query_insert_producto = mysqli_query($con, $sql_insert_producto);

if ($query_insert_producto) {
    // Redireccionar al index.php
    Header("Location: ../index.php");
} else {
    // Manejar el error de la inserción
    echo "Error al registrar el producto. Por favor, inténtelo de nuevo.";
}
?>
