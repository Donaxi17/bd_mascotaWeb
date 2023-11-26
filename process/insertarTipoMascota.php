<?php

require_once(__DIR__ . "../../controller/tipoMascota.controller.php");

$objTipoMascota = new TipoMascotaController;

$objTipoMascota->InsertTipoMascota($_POST["nuevoTipoMascota"]);
?>