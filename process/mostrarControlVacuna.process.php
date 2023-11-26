<?php

require_once(__DIR__ . "../../controller/controlVacuna.controller.php");

$objControlVacuna = new ControlVacunaController;
$modeloControlVacuna = new ControlVacuna;

$getControlVacuna = $objControlVacuna->getControlVacuna();

?>