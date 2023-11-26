<?php

require_once __DIR__ . "/vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

require_once __DIR__ . "/controller/mascota.controller.php";
$objMascota = new MascotaController;
$arrayMascota = $objMascota->getMascota($_SESSION['userId']);

require_once __DIR__ . "/controller/raza.controller.php";
require_once __DIR__ . "/controller/tipoMascota.controller.php";
$objTipoMascota = new TipoMascotaController;
$objRaza = new RazaController;

$result2 = $objTipoMascota->getTipoMascota2();
$result = $objRaza->getRaza();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Css/pantallaPrincipal.css">
  <link rel="icon" href="./img/img_index/logo.png">
  <script src="./Js/pantallaPrincipal.js" defer></script>
  <title>Crud</title>
</head>

<body>
  <div class="pantalla-carga" id="pantalla-carga">
    <div>
      <figure>
        <img src="./img/img_pantallaPrincipal/bienvenida.png" alt="bienvenida">
      </figure>
      <h2>BIENVENIDO <br> <span>
          <?php echo $_SESSION["username"]; ?>
        </span></h2>
    </div>
  </div>
  <?php
  require_once __DIR__ . "/view/header.html";
  ?>
  <main>
    <article>
      <div class="foto__perfilMascota">
        <img src="./img/img_pantallaPrincipal/foto__perfilMascota.png" alt="">
      </div>
      <section class="main__informacionMascota">
        <?php
        // $json = json_encode($arrayMascota, JSON_PRETTY_PRINT);
        // echo nl2br($json);
        // print_r($arrayMascota);
        ?>
        <?php
        if ($arrayMascota != null) {
          ?>
          <?php foreach ($arrayMascota as $value): ?>
            <div>
              <h3>Nombre mascota: <span>
                  <?php echo $value->nombre; ?>
                </span></h3>
            </div>
            <div>
              <h3>Fecha de Nacimiento: <span>
                  <?php echo $value->fechaNacimiento; ?>
                </span></h3>
            </div>
            <div>
              <h3>Nombre del Amo: <span>
                  <?php echo $_SESSION['username']; ?>
                </span></h3>
            </div>
            <div>
              <h3>Tipo de Mascota: <span>
                  <?php echo $objTipoMascota->getTipoMascota($value->tipoMascotaId); ?>
                </span></h3>
            </div>
            <div>
              <h3>Tipo de Raza: <span>
                  <?php echo $objRaza->getNombreRaza($value->RazaId); ?>
                </span></h3>
            </div>
            <div class="botonesAjustes">
              <button class="btnColor--azul" id="btnEditar" type="button">Editar</button>
              <button class="btnColor--rojo" type="button" id="btnEliminar">Eliminar</button>
            </div>
            <!-- ----------------------------------------------------- -->
            <section class="formEditar" id="formEditar">
              <form action="" method="post">
                <div>
                  <label>Nombre</label>
                  <input type="text" class="nombreMascota" required name="nombreMascota" placeholder="Mascota">
                </div>
                <div>
                  <label>Fecha de Nacimiento</label>
                  <input type="date" class="fechaNacimiento" required name="fechaNacimiento">
                </div>
                <div>
                  <label>Raza</label>
                  <select name="selectRaza" id="">
                    <?php foreach ($result as $value): ?>
                      <option value='<?php echo $value->id ?>'>
                        <?php echo $value->nombre ?>
                      </option>
                    <?php endforeach ?>
                    <option value='Otro'>Otro</option>
                  </select>
                </div>
                <div>
                  <label>Tipo de Mascota</label>
                  <select name="selectTipoMascota" id="">
                    <?php foreach ($result2 as $value): ?>
                      <option value='<?php echo $value->id ?>'>
                        <?php echo $value->nombre ?>
                      </option>
                    <?php endforeach ?>
                    <option value='Otro'>Otro</option>
                  </select>
                </div>
                </select>
                <div class="botonesAjustes btnForm--posicion">
                  <button class="btnColor--azul" name="btnGuardar">Guardar</button>
                  <button class="btnColor--rojo" id="btnCancelar2" type="button">Cancelar</button>
                </div>
                <?php
                if (!empty($_POST["nombreMascota"]) && !empty($_POST["fechaNacimiento"])) {
                  require_once __DIR__ . "/process/actualizarMascota.process.php";
                }
                ?>
              </form>
            </section>
            <!-- ----------------------------------------------------- -->
            <section class="formEliminar" id="formEliminar">
              <form action="" method="post">
                <h3>¿ Seguro que deseas eliminar su mascota?</h3>
                <div class="botonesAjustes btnForm--posicion">
                  <button class="btnColor--rojo" name="btnSi" type="submit" >Si</button>
                  <button class="btnColor--azul" id="btnNo" type="button">No</button>
                </div>
              </form>
              <?php
              if (isset($_POST["btnSi"])){
                require_once __DIR__ . "/process/eliminarMascota.process.php";
              }
              ?>
            </section>
          <?php endforeach ?>
        <?php } ?>
        <?php if ($arrayMascota == null) {
          ?>
          <div>
            <h3>Nombre mascota:

            </h3>
          </div>
          <div>
            <h3>Fecha de Nacimiento:</h3>
          </div>
          <div>
            <h3>Nombre del Amo:</h3>
          </div>
          <div>
            <h3>Tipo de Mascota:</h3>
          </div>
          <div>
            <h3>Tipo de Raza:</h3>
          </div>
          <div class="botonesAjustes">
            <button class="btnColor--azul" id="btnAgregar" type="button">Agregar</button>
          </div>
          <!-- ----------------------------------------------------- -->
          <section class="formAgregar" id="formAgregar">
            <form action="" method="post">
              <div>
                <label for="">Nombre</label>
                <input type="text" class="nombreMascota" required name="nombreMascota" placeholder="Mascota">
              </div>
              <div>
                <label for="">Fecha de Nacimiento</label>
                <input type="date" class="fechaNacimiento" required name="fechaNacimiento">
              </div>
              <div>
                <label for="">Raza</label>
                <select name="selectRaza" id="">
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
                <select name="selectTipoMascota" id="">
                  <?php foreach ($result2 as $value): ?>
                    <option value='<?php echo $value->id ?>'>
                      <?php echo $value->nombre ?>
                    </option>
                  <?php endforeach ?>
                  <option value='Otro'>Otro</option>
                </select>
              </div>
              </select>
              <div class="botonesAjustes btnForm--posicion">
                <button class="btnColor--azul" type="submit">Guardar</button>
                <button class="btnColor--rojo" id="btnCancelar" type="button">Cancelar</button>
              </div>
              <?php
              if (!empty($_POST["nombreMascota"]) && !empty($_POST["fechaNacimiento"])){
                require_once __DIR__ . "/process/insertarMiMascota.process.php";
              }
              ?>
            </form>
          </section>
          <?php
        }
        ?>
        <script>
          const formAgregar = document.getElementById("formAgregar");
          document.getElementById("btnAgregar").addEventListener("click", () => {
            formAgregar.style.display = "block";
          })
          document.getElementById("btnCancelar").addEventListener("click", () => {
            formAgregar.style.display = "none";
          })
        </script>
      </section>
    </article>
  </main>
</body>

</html>

<?php
if (!isset($_SESSION['username'])) {
  header("location:login.php");
}
?>