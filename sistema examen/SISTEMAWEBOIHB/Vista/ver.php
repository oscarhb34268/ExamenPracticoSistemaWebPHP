<?php 
    include("../Modelo/conexionBD.php");
    $con=conectar();

    $id=$_GET['id'];

    // Modifica tu consulta para incluir un JOIN con la tabla tipoproducto
    $sql="SELECT p.*, t.productotipos as tipo_nombre 
          FROM productos p
          INNER JOIN tipoproducto t ON p.tipo_id = t.id
          WHERE p.id='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/estilo.css">
    <title>Ver datos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <header class="bg-secondary text-white text-center py-3">
        <h1 class="font-weight-bold">SISTEMA WEB DE OIHB</h1>
    </header>
    <div class="container-fluid custom-container">
    <div class="title">VISUALIZANDO DATOS DE <?php echo $id; ?> </div>
        <div class="container table-container">
            <table class="table">
                <!-- Formulario de Bootstrap para editar -->
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
                            <!-- Usa el nombre del tipo obtenido del JOIN -->
                            <td><label><?php echo $row['tipo_nombre']  ?></label></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <!-- Botón de volver-->
                                <a href="../index.php" class="btn btn-secondary">Volver</a>
                            </td>
                        </tr>
                    </tfoot>
                </form>
            </table>
        </div>
    </div>
</body>
</html>
