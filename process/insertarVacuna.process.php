<?php

require_once(__DIR__ . "../../controller/vacunas.controller.php");

$objVacuna = new VacunaController;
$modeloVacuna = new Vacuna;

$modeloVacuna->nombre = $_POST["nuevaVacuna"];

$objVacuna->InsertVacuna($modeloVacuna);
header("location:vacunas.php");

?>