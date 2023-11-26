<?php

require_once(__DIR__ . "../../controller/vacunas.controller.php");

$objVacuna = new VacunaController;
$modeloVacuna = new Vacuna;

$modeloVacuna->id = $_POST["idVacuna"];
$modeloVacuna->nombre = $_POST["ActualizarNombre"];

$objVacuna->UpdateVacuna($modeloVacuna);
header("location:vacunas.php");

?>