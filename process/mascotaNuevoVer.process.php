<?php

require_once(__DIR__ . "../../controller/mascota.controller.php");

$objMascota = new MascotaController;
$modeloMascota = new Mascota;

$modeloMascota->nombre = $_POST["nombreMascota"];
$modeloMascota->userId = $_POST["nombreAmo"];
$modeloMascota->tipoMascotaId = $_POST["tipoMascota"];
$modeloMascota->RazaId = $_POST["raza"];
$modeloMascota->fechaNacimiento = $_POST["fecha"];

$objMascota->InsertMascota($modeloMascota);

header("location: ../../razas.php");
?>