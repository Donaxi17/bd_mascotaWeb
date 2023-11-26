<?php
require_once __DIR__ . "/vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . "/process/mostrarControlVacuna.process.php";
require_once __DIR__ . "/controller/controlVacuna.controller.php";
require_once __DIR__ . "/controller/vacunas.controller.php";
require_once __DIR__ . "/controller/mascota.controller.php";
require_once __DIR__ . "/controller/user.controller.php";
$objCV = new ControlVacunaController;
$objVacuna = new VacunaController;
$objMascota = new MascotaController;
$objUser = new UserController;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./img/img_index/logo.png">
  <link rel="stylesheet" href="./Css/vacunas.css">
  <script src="/Js/vacuna.js" defer></script>
  <title>Vacunas</title>
</head>

<body>
  <?php
  require_once __DIR__ . "/view/header.html";
  ?>
  <main>
    <section class="primera_sectionMain main__section">
      <h2>Nuestras Vacunas</h2>
      <div class="info__vacunas">
        <div class="info__vacunas--titulo">
          <h3>Id</h3>
          <h3 class="info__vacunas--nombre">Nombre</h3>
        </div>
        <section class="conten__datos">
          <?php require_once __DIR__ . "/process/mostrarVacunas.process.php"; ?>
          <?php foreach ($getVavuna as $value): ?>
            <article class="datos__vacuna">
              <div>
                <p>
                  <?php echo $value->id ?>
                </p>
              </div>
              <div>
                <p>
                  <?php echo $value->nombre ?>
                </p>
              </div>
            </article>
          <?php endforeach ?>
        </section>
      </div>
      <div class="conten__botones">
        <button class="color--Verde" id="btnNuevo">Nuevo</button>
        <button class="color--Azul" id="btnEditar">Editar</button>
        <button class="color--Rojo" id="btnEliminar">Eliminar</button>
      </div>
      <div class="form__vacunasNueva" id="form__vacunasNueva">
        <form action="" method="post">
          <div>
            <input type="text" name="nuevaVacuna" required placeholder="Nombre Vacuna">
          </div>
          <article>
            <button type="submit" name="Enviar1">Enviar</button>
            <button class="btnCancelarNuevo" id="btnCancelarNuevo">Cancelar</button>
          </article>
          <?php
          if (!empty($_POST["nuevaVacuna"]) && isset($_POST["Enviar1"])) {
            require_once __DIR__ . "/process/insertarVacuna.process.php";
          }
          ?>
        </form>
      </div>
      <div class="form__vacunasActualizar" id="form__vacunasActualizar">
        <form action="" method="post">
          <div>
            <input type="text" name="idVacuna" required placeholder="Id Vacuna">
            <input type="text" name="ActualizarNombre" required placeholder="Actualizar Nombre">
          </div>
          <article>
            <button type="submit" name="Enviar2">Enviar</button>
            <button class="btnCancelarActualizar" id="btnCancelarActualizar">Cancelar</button>
          </article>
          <?php
          if (!empty($_POST["idVacuna"]) && isset($_POST["Enviar2"])) {
            require_once __DIR__ . "/process/actualizarVacuna.process.php";
          }
          ?>
        </form>
      </div>
      <div class="form__vacunasEliminar" id="form__vacunasEliminar">
        <form action="" method="post">
          <div>
            <input type="text" name="idVacuna2" required placeholder="Id Vacuna">
          </div>
          <article>
            <button type="submit" name="Enviar3">Enviar</button>
            <button class="btnCancelarEliminar" id="btnCancelarEliminar">Cancelar</button>
          </article>
          <?php
          if (!empty($_POST["idVacuna2"]) && isset($_POST["Enviar3"])) {
            require_once __DIR__ . "/process/eliminarVacuna.process.php";
          }
          ?>
        </form>
      </div>
    </section>

    <section class="segunda_sectionMain main__section">
      <h2>Contro de Vacuna</h2>
      <form action="" method="post">
        <div class="conten__inputs">
          <?php $sql = $objMascota->getMascotaNombres();?>
          <?php $sqlVacuna = $objVacuna->getVacuna();?>
          <select name='opcionMascota' class='selectFor'>
            <?php foreach ($sql as $value): ?>
              <option value='<?php echo $value->id ?>'>
                <?php echo $value->nombre ?>
              </option>
            <?php endforeach ?>
          </select>
          <select name='opcionVacuna' class='selectFor'>
            <?php foreach ($sqlVacuna as $value): ?>
              <option value='<?php echo $value->id ?>'>
                <?php echo $value->nombre ?>
              </option>
            <?php endforeach ?>
          </select>
          <input type="date" name="fechaVacuna" required>
        </div>
        <div class="conten__button">
          <button type="submit" name="btnEnviar" class="btnEnviar">Enviar</button>
          <button class="btnEliminar">Limpiar</button>
        </div>
        <?php
        if (isset($_POST["btnEnviar"])) {
          require_once __DIR__ . "/process/insertarControlVacuna.process.php";
        }
        ?>
      </form>
      <div class="conten__controlVacuna">
        <div class="dato__controlVacuna--titulo">
          <h3>Amo</h3>
          <h3>Nombre</h3>
          <h3>Vacuna</h3>
          <h3>Fecha</h3>
        </div>
        <section class="conten__datos--CV">
          <?php
          ?>
          <?php foreach ($getControlVacuna as $value): ?>
            <?php $UserId = $objMascota->getUserId($value->mascotaId); ?>
            <article class="datos__controlVacuna">
              <div class="idDatoMascota">
                <p>
                  <?php echo $objUser->getNombreUser($UserId); ?>
                </p>
              </div>
              <div class="nombreDatoMascota">
                <p>
                  <?php echo $objMascota->getNombreMascota($value->mascotaId); ?>
                </p>
              </div>
              <div class="vacunaDatoMascota">
                <p>
                  <?php echo $objCV->getNombreVacunaId($value->vacunaId); ?>
                </p>
              </div>
              <div class="fechaDatoMascota">
                <p>
                  <?php echo $value->fecha; ?>
                </p>
              </div>
            </article>
          <?php endforeach ?>
        </section>
      </div>
    </section>
  </main>
</body>

</html>