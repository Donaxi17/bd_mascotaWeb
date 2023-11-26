<?php
require_once __DIR__ . "/vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

require_once __DIR__ ."/controller/user.controller.php";
require_once __DIR__ ."/controller/raza.controller.php";

$objUser = new UserController;
$userId = $objUser->getUserId($_SESSION['username']);
$_SESSION['userId'] = $userId;

$objRaza = new RazaController;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Css/miMascota.css">
  <link rel="icon" href="./img/img_index/logo.png">
  <title>Registro Mascota</title>
</head>

<body>
  <main>
    <h2>Registra tu mascota</h2>
    <span><?php echo $_SESSION['username']; ?></span>
    <div class="cont__inputs">
      <form action="" method="post">
        <?php
        require_once __DIR__ . "/controller/tipoMascota.controller.php";
        require_once __DIR__ . "/controller/raza.controller.php";
        $objTipoMascota = new TipoMascotaController;
        $objRaza = new RazaController;
        $result2 = $objTipoMascota->getTipoMascota2();
        $result = $objRaza->getRaza();
        ?>
        <div>
          <label for="">Nombre</label>
          <input type="text" class="nombreMascota" required name="nombreMascota" placeholder="Nombre de la mascota">
        </div>
        <div>
          <label for="">Fecha de Nacimiento</label>
          <input type="date" class="fechaNacimiento" required name="fechaNacimiento">
        </div>
        <div>
          <label for="">Raza</label>
          <select name="selectRaza">
            <?php foreach ($result as $value): ?>
              <option value='<?php echo $value->id ?>'>
                <?php echo $value->nombre ?>
              </option>
            <?php endforeach ?>
            <option value='Otro'>Otro</option>
          </select>
        </div>
        <div>
          <label for="">Tipo de Mascota</label>
          <select name="selectTipoMascota">
            <?php foreach ($result2 as $value): ?>
              <option value='<?php echo $value->id ?>'>
                <?php echo $value->nombre ?>
              </option>
            <?php endforeach ?>
            <option value='Otro'>Otro</option>
          </select>
        </div>
        <button type="submit" name="btnEnviar">Enviar</button>

        <?php
        if (isset($_POST["btnEnviar"]) && !empty($_POST["nombreMascota"]) && !empty($_POST["fechaNacimiento"])) {
          require_once __DIR__ ."/process/insertarMiMascota.process.php";
        }
        ?>
      </form>
    </div>
  </main>
</body>

</html>