<?php

require_once(__DIR__ . "../../controller/mascota.controller.php");

$objMascota = new MascotaController;
$modeloMascota = new Mascota;

$modeloMascota->id = $_SESSION["userId"];
$modeloMascota->nombre = $_POST["nombreMascota"];
$modeloMascota->fechaNacimiento = $_POST["fechaNacimiento"];
$modeloMascota->tipoMascotaId= $_POST["selectTipoMascota"];
$modeloMascota->RazaId = $_POST["selectRaza"];

$objMascota->UpdateMascota($modeloMascota);

?>