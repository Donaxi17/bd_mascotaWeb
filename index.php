<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/style.css">
    <script src="./Js/main.js" defer></script>
    <title>Document</title>
  </head>

  <body>
    <h1>Este es el Index</h1>
  </body>

</html>

<?php
  require_once __DIR__ . "/vendor/autoload.php";

  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  echo "<br>";
  require_once(__DIR__ . './controller/conexion.php');

  $conn = new Conexion;
  $conn->connect();

?>