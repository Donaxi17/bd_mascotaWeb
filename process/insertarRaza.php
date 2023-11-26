<?php

require_once(__DIR__ . "../../controller/raza.controller.php");

$objRaza = new RazaController;
$modeloRaza = new Raza;

$modeloRaza->nombre = $_POST["Name"];
$modeloRaza->TipoMascota_Id = 2;

$objRaza->InsertarRaza($modeloRaza);
header("location:razas.php");
?>