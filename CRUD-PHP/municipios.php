<?php
include 'conexion.php';

$municipio = $_POST['municipio']; 


$query = "SELECT `id`, `municipio` FROM `tbmunicipio` WHERE `municipio` = '$municipio'";
$resultado = mysqli_query($conexion, $query);

while($munis = mysqli_fetch_array($resultado))
{
    echo "<option value='{$munis['idmunicipio']}'>{$munis['municipio']}</option>";
}

?>