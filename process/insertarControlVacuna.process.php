<?php

require_once(__DIR__ . "../../controller/controlVacuna.controller.php");

$objControlVacuna = new ControlVacunaController;
$modeloControlVacuna = new ControlVacuna;

$modeloControlVacuna->mascotaId = $_POST["opcionMascota"];
$modeloControlVacuna->vacunaId = $_POST["opcionVacuna"];
$modeloControlVacuna->fecha = $_POST["fechaVacuna"];

$objControlVacuna->InsertControlVacuna($modeloControlVacuna);
?>