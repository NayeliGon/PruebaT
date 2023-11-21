<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Actualizar Registro</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Cliente*</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $cliente; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Dirección*</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $direccion; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="municipio" class="form-label">Municipio*</label>
                    <select name="municipio" id="municipio" class="form-select" required>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultadoMunicipios)) {
                            $selected = ($row['id'] == $municipio) ? 'selected' : '';
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento*</label>
                    <select name="departamento" id="departamento" class="form-select" required>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultadoDepartamentos)) {
                            $selected = ($row['id'] == $departamento) ? 'selected' : '';
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 text-center">
                    <input type="hidden" name="accion" value="actualizar_producto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
