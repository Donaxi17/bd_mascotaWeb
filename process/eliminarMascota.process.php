<?php

require_once(__DIR__ . "../../controller/mascota.controller.php");

$objMascota = new MascotaController;
$modeloMascota = new Mascota;

$modeloMascota->userId = $_SESSION["userId"];

$objMascota->Eliminar2($modeloMascota);

?>