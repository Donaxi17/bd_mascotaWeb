<?php
require_once(__DIR__ . "/../controller/user.controller.php");

$genderC = new UserController;
$modeloUser = new User;

$modeloUser->nombre = $_POST["NAME"];
$modeloUser->userName = $_POST["USERNAME"];
$modeloUser->email = $_POST["EMAIL"];
$modeloUser->clave = password_hash($_POST["PASSWORD"], PASSWORD_BCRYPT) ;

$genderC->createUser($modeloUser);
header("location:login.php");

?>