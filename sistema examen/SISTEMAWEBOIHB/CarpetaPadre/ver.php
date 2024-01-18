<?php 
    include("conexionBD.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM productos WHERE id='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Actualizar datos</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-secondary text-white text-center py-3">
        <h1 class="font-weight-bold">SISTEMA WEB DE OIHB</h1>
    </header>
    <div class="container-fluid custom-container">
     

        <div class="container table-container">
            <table class="table">
                <!-- Formulario -->
                <form action="actualizar_registro.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td><label><?php echo $row['nombre']  ?></label></td>
                        </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td><label><?php echo $row['cantidad']  ?></label></td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td><label><?php echo $row['tipo']  ?></label></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <!-- Botones de guardar y cancelar -->
                                <a href="index.php" class="btn btn-secondary">Volver</a>
                            </td>
                        </tr>
                    </tfoot>
                </form>
            </table>
        </div>
    </div>
</body>
</html>
