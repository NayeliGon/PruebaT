<?php 
include("conexion.php");

// Función para obtener los registros de la base de datos
function obtenerRegistros() {
    global $conexion;
    $sql = "SELECT * FROM tbgeneral";
    $result = mysqli_query($conexion, $sql);

    if (!$result) {
        die("Error al obtener registros: " . mysqli_error($conexion));
    }

    return $result;
}

$result = obtenerRegistros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlace a Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Enlace a tu estilo personalizado -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div id="content">
        <section>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="text-center mb-4">CRUD</h1>
                        <div class="mb-3">
                            <!-- Botón para redirigir a insertar.php -->
                            <a href="insertar.php" class="btn btn-success"><i class="fas fa-plus"></i> Insertar Nuevo</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Dirección</th>
                                        <th>Financiamiento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['cliente'] . '</td>';
                                        echo '<td>' . $row['direccion'] . '</td>';
                                        echo '<td>Q' . $row['financiamiento'] . '</td>';
                                        echo '<td>';
                                        echo '<a href="actualizar.php?id=' . $row['id'] . '" class="btn btn-primary"><i class="fas fa-edit"></i> Actualizar</a>';
                                        echo ' | ';
                                        echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }

                                    // Liberar el resultado después de usarlo
                                    mysqli_free_result($result);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Enlace a Bootstrap JS y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
