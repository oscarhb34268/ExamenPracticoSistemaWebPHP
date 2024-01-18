<?php
include("conexionBD.php");
$con = conectar();

// Obtener opciones de la tabla tipoproducto
$sql_tipos = "SELECT productotipos FROM tipoproducto";
$query_tipos = mysqli_query($con, $sql_tipos);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    function validarFormulario() {
        var id = document.getElementsByName("id")[0].value;
        var nombre = document.getElementsByName("nombre")[0].value;
        var cantidad = document.getElementsByName("cantidad")[0].value;
        var tipo = document.getElementById("tipo").value;

        if (id === '' || nombre === '' || cantidad === '' || tipo === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Todos los campos son obligatorios. Por favor, llénelos antes de enviar el formulario.'
            });
            return false;
        }

        return true;
    }
</script>

    
</head>
<body>
    <header class="bg-secondary text-white text-center py-3">
            <h1 class="font-weight-bold">SISTEMA WEB DE OIHB</h1>
        </header>
    <div class="container-fluid custom-container">
        <div class="title">SISTEMA WEB DE OIHB</div>

        <div class="container table-container">
            <table class="table">
                <!-- Formulario para agregar nuevo registro -->
                <form action="agregar_nuevo.php" method="POST" onsubmit="return validarFormulario()">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id" placeholder="ID del producto"></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="nombre" placeholder="Nombre del producto"></td>
                        </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td><input type="number" name="cantidad" placeholder="Cantidad del producto" min="0" pattern="\d*"></td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="tipo" id="tipo">
                                        <option value="" selected disabled>Seleccione tipo...</option>
                                        <?php
                                        while ($row_tipo = mysqli_fetch_assoc($query_tipos)) {
                                            echo "<option value='{$row_tipo['productotipos']}'>{$row_tipo['productotipos']}</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2">
                                <!-- Botones de guardar y cancelar -->
                                <button type="submit" class="btn btn-primary">Guardar Nuevo producto</button>
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            </td>
                        </tr>
                    </tfoot>
                </form>
            </table>
        </div>
    </div>
</body>
</html>
