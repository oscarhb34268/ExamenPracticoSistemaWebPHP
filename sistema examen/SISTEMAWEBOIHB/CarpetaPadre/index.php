<?php
include("conexionBD.php");
$con = conectar();

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $sql = "SELECT * FROM productos WHERE nombre LIKE '%$buscar%' OR id LIKE '%$buscar%' OR tipo LIKE '%$buscar%' ORDER BY nombre ASC";
} else {
    $sql = "SELECT * FROM productos ORDER BY nombre ASC";
}

$query = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>CRUD Sistema Web de OIHB</title>
</head>

<body>
    <header class="bg-secondary text-white text-center py-3">
        <h1 class="font-weight-bold">SISTEMA WEB DE OIHB</h1>
    </header>
    <div class="container-fluid custom-container">

        <div class="search-bar">
            <div class="input-group">
                <input type="text" class="form-control" id="campoBusqueda" placeholder="Buscar...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="buscar()">Buscar</button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <input type="button" class="btn btn-success add-button" onclick="window.location.href='agregar.php'" name="mas" value="Nuevo Registro &#43;">
        </div>

        <div class="container-fluid table-container">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['cantidad'] ?></td>
                            <td><?php echo $row['tipo'] ?></td>
                            <td><a href="ver.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Ver &#128065;</a></td>    
                            <td><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Modificar &#9997;</a></td>
                            <td><a class="btn btn-danger text-white" onclick="preguntarEliminar(<?php echo $row['id'] ?>)">Eliminar &#128465;</a></td>    
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
    function preguntarEliminar(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción eliminará permanentemente el registro.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "eliminar.php?id=" + id;
                Swal.fire('¡Perfecto!', 'Has eliminado correctamente.', 'success');
            }
        });
    }
    function buscar() {
            var valorBusqueda = document.getElementById("campoBusqueda").value;
            window.location.href = "index.php?buscar=" + valorBusqueda;
        }
        
</script>
</body>
</html>
