<?php
require_once __DIR__ . "/vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . "/controller/mascota.controller.php";
require_once __DIR__ . "/controller/user.controller.php";
$objMascota = new MascotaController;
$objUser = new UserController;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Css/login.css">
  <link rel="icon" href="./img/img_index/logo.png">
  <script src="./Js/login.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
  <title>Login</title>
</head>

<body>
  <main>
    <?php
    require_once(__DIR__ . './controller/conexion.php');
    $conn = new Conexion;

    if (isset($_POST["iniciarSesion"])) {
      if (!empty($_POST["USERNAME"]) && !empty($_POST["PASSWORD"])) {
        $usuario = $conn->connect()->real_escape_string($_POST["USERNAME"]);
        $clave = $conn->connect()->real_escape_string($_POST["PASSWORD"]);

        $sql = $conn->connect()->query("SELECT * FROM user WHERE username ='$usuario'");
        $nr = mysqli_num_rows($sql);
        $buscandoPass = mysqli_fetch_array($sql);

        if ($nr == 1 && password_verify($clave, $buscandoPass["clave"])) {
          session_destroy();
          session_start();
          $_SESSION['username'] = $usuario;

          $userId = $objUser->getUserId($usuario);
          $resulUserid = $objMascota->getExiUser($userId);
          $_SESSION['userId'] = $userId;

          if ($resulUserid > 0) {
            header("location:pantallaPrincipal.php");
          } else {
            header("location:miMascota.php");
          }

        } else {
          echo
            "<script>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({title: 'Error', text: 'Usuario o Contraseña no coinciden', icon: 'error'});});
          </script>";
        }
      }
    }
    ?>
    <form action="" method="post">
      <input type="hidden" name="form_submit" value="1"> <!-- Campo oculto para verificar el envío del formulario -->
      <h2 id="coco">Inicio de sesión</h2>
      <div class="input__login">
        <input type="text" name="USERNAME" required placeholder="Usuario">
      </div>
      <div class="input__login">
        <input type="password" name="PASSWORD" required placeholder="Contraseña">
      </div>
      <div class="Remember__Me">
        <div>
          <input type="checkbox" name="" id="check">
          <label for="check">Acuérdate de mí</label>
        </div>
        <a href="">Recuperar contraseña?</a>
      </div>
      <article>
        <button type="submit" name="iniciarSesion">Iniciar Sesión</button>
        <a href="./registro.php">Registrarse</a>
      </article>
    </form>
  </main>
  <section class="foto_login">
    <img src="./img/img_login/fotoPrincipal_login.jpg" alt="foto principal">
  </section>
</body>

</html>