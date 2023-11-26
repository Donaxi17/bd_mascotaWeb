
<?php

require_once(__DIR__ . "../../controller/vacunas.controller.php");

$objVacuna = new VacunaController;
$modeloVacuna = new Vacuna;

$getVavuna = $objVacuna->getVacuna();

?>