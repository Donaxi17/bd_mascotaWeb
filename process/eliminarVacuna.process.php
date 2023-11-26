<?php

require_once(__DIR__ . "../../controller/vacunas.controller.php");

$objVacuna = new VacunaController;
$modeloVacuna = new Vacuna;

$modeloVacuna->id = $_POST["idVacuna2"];

$objVacuna->DeleteVacuna($modeloVacuna);
header("location:vacunas.php");

?>