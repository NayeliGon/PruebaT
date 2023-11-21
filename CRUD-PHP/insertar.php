<?php
include("conexion.php");

$sqlMunicipios = "SELECT * FROM municipios";
$resultMunicipios = mysqli_query($conexion, $sqlMunicipios);

$sqlDepartamentos = "SELECT * FROM departamentos";
$resultDepartamentos = mysqli_query($conexion, $sqlDepartamentos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="col-sm-6 offset-3 mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Cliente*</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Dirección*</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                    </div>
                </div>
            </div>
        
            <div class="mb-3">
                <label for="municipio" class="form-label">Municipio*</label>
                <select name="municipio" id="municipio" class="form-control" required>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultMunicipios)) {
                        echo '<option value="' . $row['id'] . '">' . $row['municipio'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento*</label>
                <select name="departamento" id="departamento" class="form-control" required>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultDepartamentos)) {
                        echo '<option value="' . $row['id'] . '">' . $row['departamento'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="hidden" name="accion" value="insertar_producto">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
