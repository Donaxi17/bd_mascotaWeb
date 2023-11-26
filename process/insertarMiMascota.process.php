<?php
require_once(__DIR__ . "../../controller/mascota.controller.php");

$objMascota= new MascotaController;
$modeloMascota = new Mascota;

$modeloMascota->nombre = $_POST["nombreMascota"];
$modeloMascota->fechaNacimiento = $_POST["fechaNacimiento"];
$modeloMascota->userId = $_SESSION['userId'];
$modeloMascota->tipoMascotaId = $_POST["selectRaza"];
$modeloMascota->RazaId = $_POST["selectTipoMascota"];

$objMascota->InsertMascota2($_POST["nombreMascota"],$_POST["fechaNacimiento"],$_SESSION['userId'],$_POST["selectTipoMascota"],$_POST["selectRaza"]);
header("location:pantallaPrincipal.php");
?>