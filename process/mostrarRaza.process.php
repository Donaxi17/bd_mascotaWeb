<?php

require_once(__DIR__ . "../../controller/mascota.controller.php");
require_once(__DIR__ . "../../controller/raza.controller.php");

$objMascota = new MascotaController;
$objRaza = new RazaController;

$array = [];
$result = $objRaza->getRaza();
foreach ($result as $id) {
    $array[] = $id;
}

$sql = $objMascota->getNombreRaza();
if ($sql->num_rows > 0) {
    $razaArray = $sql->fetch_all(MYSQLI_ASSOC);
    $contador = 0;
    foreach ($razaArray as $raza) {
        $nombreRaza = $raza['nombre'];
        $cantidadMascota = $objMascota->getCantidadMascota($array[$contador]->id);
        echo "<p>$nombreRaza <span>$cantidadMascota</span></p>";
        $contador++;
    }
} else {
    echo "No se encontraron resultados.";
}

?>