<?php
require_once __DIR__ . "/vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./img/img_index/logo.png">
  <link rel="stylesheet" href="./Css/razas.css">
  <title>Razas</title>
</head>

<body>
  <?php
  require_once __DIR__ . "/view/header.html";
  ?>
  <main>
    <section class="main_registroRaza">
      <form action="" method="post">
        <h2>Registrar Raza</h2>
        <div>
          <input type="text" name="Name" required placeholder="Nombre Raza">
          <button type="submit" name="enviar">Enviar</button>
          <?php
          if (isset($_POST["enviar"]) && !empty($_POST["Name"])) {
            require_once __DIR__ . "./process/insertarRaza.php";
          }
          ?>
        </div>
      </form>
    </section>
    <section class="main_cantidadMascota">
      <h2>Cantidad de mascota</h2>
      <form action="" method="post">
        <div>
          <div class="titulo__cantidadMascota">
            <p>Raza</p>
            <p>Cantidad</p>
          </div>
          <div>
            <div class="raza-info">
              <?php require_once __DIR__ . "./process/mostrarRaza.process.php"; ?>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
</body>

</html>
