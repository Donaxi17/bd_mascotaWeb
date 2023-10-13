<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/style.css">
    <script src="./Js/main.js" defer></script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        setTimeout(function() {
          let pantallaCarga = document.getElementById("pantalla-carga");
          pantallaCarga.style.display = "none";
        }, 2000);
      });
    </script>
    <title>Docu</title>
  </head>

  <body>
    <div class="pantalla-carga" id="pantalla-carga">
      <div class="spinner"></div>
    </div>
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

  require_once(__DIR__ . './model/user.model.php');

  $objUser = new User;
  // $objUser->InsertarUsuario(4,"pepe","pepitoo","pee@gmail.com","00",2,"");
  $xx = $objUser->getUsuarios();
  print_r("<pre>");
  print_r($xx);
  print_r("</pre>");


?>