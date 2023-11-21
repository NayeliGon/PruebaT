<?php
include 'conexion.php';

$departamento = $_POST['departamento']; 


$query = "SELECT `id`, `departamento` FROM `tbdepartamento` WHERE `departamento` = '$departamento'";
$resultado = mysqli_query($conexion, $query);

while($munis = mysqli_fetch_array($resultado))
{
    echo "<option value='{$munis['id']}'>{$munis['departamento']}</option>";
}

?>