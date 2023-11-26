<?php

require_once(__DIR__ . "../../controller/mascota.controller.php");
require_once(__DIR__ . "../../controller/raza.controller.php");

$objMascota = new MascotaController;
$objRaza = new RazaController;

$sql = $objMascota->getNombreRaza();
if ($sql->num_rows > 0) {
    $razaArray = $sql->fetch_all(MYSQLI_ASSOC);
    $contador = 0;
    foreach ($razaArray as $raza) {
        $nombreRaza = $raza['nombre'];
        echo "<p>$nombreRaza</p>";
        $contador++;
    }
}
?>