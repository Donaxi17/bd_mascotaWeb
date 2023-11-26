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
  <link rel="stylesheet" href="./Css/mascotas.css">
  <script src="./Js/mascota.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
  <title>Mascota</title>
</head>

<body>
  <?php
  require_once __DIR__ . "/view/header.html";
  ?>
  <main>
    <section>
      <div class="titulos">
        <h3>Nombre</h3>
        <h3>Fecha nacimiento</h3>
        <h3>Amo</h3>
        <h3>Tipo mascota</h3>
        <h3>Raza</h3>
        <h3>Acciones</h3>
      </div>
      <div class="crud">
        <form action="" method="post" id="formTotal">
          <?php
          require_once __DIR__ . "/process/mostrarMascota.process.php";
          require_once __DIR__ . "/controller/vacunas.controller.php";
          require_once __DIR__ . "/controller/controlVacuna.controller.php";
          require_once __DIR__ . "/controller/mascota.controller.php";

          $objVacuna = new VacunaController;
          $objControlVacuna = new ControlVacunaController;
          $objMascota = new MascotaController;
          $objUser = new UserController;


          if (isset($_POST["eliminar"])) {
            $botonPresionado = $_POST["eliminar"];
            foreach ($cantidad as $boton) {
              if ($botonPresionado == $boton) {
                $objControlVacuna->EliminarControlVacuna($boton);
                $objMascota->Eliminar($boton);
                break;
              }
            }
            // header("Location: mascotas.php");
            // exit;
          }

          $idEditar = 0;

          if (isset($_POST["editar"])) {
            $botonPresionado = $_POST["editar"];
            foreach ($cantidad as $boton) {
              if ($botonPresionado == $boton) {
                $idEditar = $boton;

                $sql = $objMascota->getMascotas();

                if ($sql->num_rows > 0) {
                  $razaArray = $sql->fetch_all(MYSQLI_ASSOC);
                  foreach ($razaArray as $raza) {
                    if ($idEditar == $raza['id']) {
                      $guardarNombre = $raza['nombre'];
                      $guardarFecha = $raza['FechaNacimiento'];
                      $guardarNombreAmo = $objUser->getNombreUser($raza['User_id']);
                      $guardarTipoMascota = $objTipoMascota->getTipoMascota($raza['TipoMascota_id']);
                      $guardarNombreRaza = $objRaza->getNombreRaza($raza['Raza_id']);
                    }
                  }
                } else {
                  echo "No se encontraron resultados.";
                }

                echo "
                <div class='editar__crud'>
                  <article>
                    <input type='hidden' name='idEditar' id='editarNombre' value='$idEditar'>
                    <div class='conten__input'>
                      <label for=''>Nombre</label>
                      <input type='text' name='nombreMascota' value='$guardarNombre'>
                    </div>
                    <div class='conten__input'>
                      <label for=''>Fecha nacimiento</label>
                      <input type='date' name='fecha' value='$guardarFecha'>
                    </div>";
                $result = $objRaza->getRaza();
                $objMascota = new TipoMascotaController;
                $result2 = $objTipoMascota->getTipoMascota2();
                $nombresUser = $objUser->getUser();
                ?>
                <div class='conten__input'>
                  <label for=''>Nombre del Amo</label>
                  <select name='opcionAmo' class='selectFor'>
                    <?php foreach ($nombresUser as $value): ?>
                      <option value='<?php echo $value->id ?>'>
                        <?php echo $value->nombre ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class='conten__input'>
                  <label for=''>Tipo mascota</label>
                  <select name='opcionTipoMascota' class='selectFor'>
                    <?php foreach ($result2 as $value): ?>
                      <option value='<?php echo $value->id ?>'>
                        <?php echo $value->nombre ?>
                      </option>
                    <?php endforeach ?>
                    <option value='Otro'>Otro</option>
                  </select>
                </div>
                <div class='conten__input'>
                  <label for=''>Raza</label>
                  <select name='opcionRaza' class='selectFor'>
                    <?php foreach ($result as $value): ?>
                      <option value='<?php echo $value->id ?>'>
                        <?php echo $value->nombre ?>
                      </option>
                    <?php endforeach ?>
                    <option value='Otro'>Otro</option>
                  </select>
                </div>
                <?php
                echo "
                  </article>
                  <div class='editar__crud--botones'>
                    <button class='btnCancelar' name='cancelar1' id='btnCancelar'>Cancelar</button>
                    <input type='submit' class='btnGuardar' name='guardar' value='Guardar'>
                  </div>
                </div>
                  ";
              }
            }
          }
          if (isset($_POST["cancelar1"])) {
            header("location:mascotas.php");
          }

          if (isset($_POST["guardar"])) {
            $idEditar = $_POST["idEditar"]; // Obtén el valor del campo oculto
            $nombreMascota = $_POST["nombreMascota"];
            $fecha = $_POST["fecha"];
            $nombreAmo = $_POST["nombreAmo"];
            $tipoMascota = $_POST["opcionTipoMascota"];
            $raza = $_POST["opcionRaza"];
            $objMascota->EditarMascota($nombreMascota, $fecha, $tipoMascota, $raza, $idEditar);
            // header("Location: mascotas.php");
            // exit;
          }
          ?>
        </form>
      </div>
      <article style="display:  none;" class="vacunasMascotas" id="vacunasMascotas">
        <?php
        require_once __DIR__ . "/process/mostrarControlVacuna.process.php";
        require_once __DIR__ . "/controller/mascota.controller.php";
        require_once __DIR__ . "/controller/controlVacuna.controller.php";
        require_once __DIR__ . "/controller/user.controller.php";
        $objMascota = new MascotaController;
        $objCV = new ControlVacunaController;
        $objUser = new UserController;

        ?>

        <?php foreach ($getControlVacuna as $value): ?>
          <?php $UserId = $objMascota->getUserId($value->mascotaId); ?>
          <div class="contenResult">
            <div class="contenResult__titulos">
              <p>Nombre</p>
              <p>Amo</p>
              <p>Vacunas</p>
              <p>Cantidad</p>
            </div>
            <div class="contenResult__datos">
              <div>
                <p>
                  <?php echo $objMascota->getNombreMascota($value->mascotaId); ?>
                </p>
              </div>
              <div class="divAmo">
                <p>
                  <?php echo $objUser->getNombreUser($UserId); ?>
                </p>
              </div>
              <div class="divVacuna">
                <p>
                  <?php echo $objCV->getNombreVacunaId($value->vacunaId); ?>
                </p>
              </div>
              <div class="divCantidad">
                <p>
                  <?php echo $objMascota->getCantidadVacuna($value->mascotaId); ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </article>

    </section>
    <div class="btnNuevoY__ver">
      <form action="" method="post">

        <button class="btnNuevo" name="btnNuevo">Nuevo</button>

        <?php

        if (isset($_POST["btnNuevo"])) {
          echo "
          <div class='editar__crud editar__crud--nuevo' id='editar__crud--nuevo'>
            <article>
              <input type='hidden' name='idEditar' id='editarNombre' >
              <div class='conten__input'>
                <label for=''>Nombre</label>
                <input type='text' name='nombreMascota' required>
              </div>
              <div class='conten__input'>
                <label for=''>Fecha nacimiento</label>
                <input type='date' name='fecha' required>
              </div>";
          $objMascota = new TipoMascotaController;
          $result2 = $objTipoMascota->getTipoMascota2();
          $result = $objRaza->getRaza();
          $nombresUser = $objUser->getUser();
          ?>
          <div class='conten__input'>
            <label for=''>Nombre del Amo</label>
            <select name='opcionAmo' class='selectFor'>
              <?php foreach ($nombresUser as $value): ?>
                <option value='<?php echo $value->id ?>'>
                  <?php echo $value->nombre ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
          <div class='conten__input'>
            <label for=''>Tipo mascota</label>
            <select name='opcionTipoMascota' class='selectFor'>
              <?php foreach ($result2 as $value): ?>
                <option value='<?php echo $value->id ?>'>
                  <?php echo $value->nombre ?>
                </option>
              <?php endforeach ?>
              <option value='Otro'>Otro</option>
            </select>
          </div>
          <div class='conten__input'>
            <label for=''>Raza</label>
            <select name='opcionRaza' class='selectFor'>
              <?php foreach ($result as $value): ?>
                <option value='<?php echo $value->id ?>'>
                  <?php echo $value->nombre ?>
                </option>
              <?php endforeach ?>
              <option value='Otro'>Otro</option>
            </select>

          </div>

          <?php
          echo "
            </article>
            <div class='editar__crud--botones'>
              <button class='btnCancelar' name='cancelar' id='btnCancelarNuevo'>Cancelar</button>
              <input type='submit' class='btnGuardar' id='guardarNuevo' name='guardarF2' value='Guardar'>
            </div>
          </div>";
        }

        if (isset($_POST["guardarF2"]) && !empty($_POST["nombreMascota"]) && !empty($_POST["fecha"])) {
          $objMascota->InsertMascota2($_POST["nombreMascota"], $_POST["fecha"], $_POST["opcionAmo"], $_POST["opcionTipoMascota"], $_POST["opcionRaza"]);
          // header("Location: mascotas.php");
          // exit;
        }
        ?>
      </form>
      <button class="btnVacunas" name="" id="btnVacunas">Vacunas</button>
    </div>
  </main>
  <section class="primera__section">
    <article class="primera__section--article">
      <div class="tiposRazas conteinersDiv">
        <h2>Tipos de Razas</h2>
        <?php require_once __DIR__ . "./process/mostrarRaza2.process.php"; ?>
        <h4>Cantidad = <span>
            <?php echo $contador ?>
          </span></h4>
      </div>
      <div class="tiposMascota conteinersDiv">
        <h2>Tipos de Mascotas</h2>
        <div class="dicMMM">
          <?php
          $result2 = $objTipoMascota->getTipoMascota2();
          $co = 0;
          foreach ($result2 as $value):
            echo "<br>$value->nombre<br>";
            $co++;
          endforeach
          ?>
        </div>
        <h4>Cantidad = <span>
            <?php echo $co ?>
          </span></h4>
        <form action="" method="post" id="coco">
          <div class="inputButton">
            <input type="text" name="nuevoTipoMascota" required placeholder="Nuevo tipo de mascota">
            <button type="submit" name="enviarTipoMascota">Enviar</button>
          </div>
          <?php
          if (isset($_POST["nuevoTipoMascota"])) {
            require_once __DIR__ . "/process/insertarTipoMascota.php";
          }
          ?>
        </form>
      </div>
    </article>
  </section>
</body>

</html>