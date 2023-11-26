<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_POST["NAME"]) && isset($_POST["USERNAME"]) && isset($_POST["EMAIL"]) && isset($_POST["PASSWORD"]) && isset($_POST["enviar"]) &&
  !empty($_POST["NAME"]) && !empty($_POST["USERNAME"]) && !empty($_POST["EMAIL"]) && !empty($_POST["PASSWORD"])) {
  require_once __DIR__ . "/process/crearUser.process.php";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["NAME"];
  $email = $_POST["EMAIL"];
  $password = $_POST["PASSWORD"];

  $errorUser = "";
  $errorCorreo = "";
  $errorPassword = "";

  if (strlen($name) < 4) {
    $errorUser = "Nombre debe tener al menos 4 caracteres.";
  } elseif (strlen($name) > 16) {
    $errorUser = "Nombre no puede tener más de 16 caracteres.";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorCorreo = "Correo no válido.";
  }

  $pattern = "/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\-]/";
  if (!preg_match($pattern, $password) || !preg_match("/\d/", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password)) {
    $errorPassword = "La contraseña debe cumplir con los requisitos.";
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Css/registro.css">
  <link rel="icon" href="./img/img_index/logo.png">
  <!-- <script src="./Js/registro.js" defer></script> -->
  <title>Registrarse</title>
</head>

<body>
  <main>
    <form action="" method="post">
      <h2 id="coco">Registrarse</h2>
      <div class="input__login">
        <input type="text" id="name" name="NAME"  placeholder="Nombre" value="<?php echo $_POST["NAME"] ?? "" ?>">
        <?php if(isset($_POST["NAME"])) {echo '<div class="error-message">' . $errorUser . '</div>';}?>
        <!-- <p id="p_nombre"></p> -->
      </div>
      <div class="input__login">
        <input type="text" id="nameuser"  name="USERNAME"  placeholder="Usuario" value="<?php echo $_POST["USERNAME"] ?? "" ?>">
        <!-- <p id="p_nombreUsuario"></p> -->
      </div>
      <div class="input__login">
        <input type="email" id="email" name="EMAIL"  placeholder="Correo" value="<?php echo $_POST["EMAIL"] ?? "" ?>">
        <?php if(isset($_POST["NAME"])) {echo '<div class="error-message">' . $errorCorreo . '</div>';}?>
        <!-- <p id="p_correo"></p> -->
      </div>
      <div class="input__login">
        <input type="text" id="password" name="PASSWORD"  placeholder="Contraseña" value="<?php echo $_POST["PASSWORD"] ?? "" ?>">
        <?php if(isset($_POST["NAME"])) {echo '<div class="error-message">' . $errorPassword . '</div>';}?>
        <!-- <p id="p_contraseña"></p> -->
      </div>
      <div class="Remember__Me">
        <div>
          <input type="checkbox" name="" id="check">
          <label for="check">Acuerdame</label>
        </div>
        <a href="">Recuperar contraseña?</a>
      </div>
      <article>
        <button type="submit" name="enviar">Registrarse</button>
        <a href="./login.php">Iniciar Session</a>
      </article>
    </form>
  </main>
  <section class="foto_login">
    <img src="./img/img_login/fotoSecundaria_login.jpg" alt="foto principal">
  </section>
</body>

</html>

<?php
// require_once __DIR__ . "/vendor/autoload.php";

// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// require_once(__DIR__ . './controller/conexion.php');
// require_once(__DIR__ . './model/user.model.php');

// $conn = new Conexion;

// if (isset($_POST["NAME"]) && isset($_POST["USERNAME"]) && isset($_POST["EMAIL"]) && isset($_POST["PASSWORD"])) {
//   // echo "<script> alert('hola') </script>";
//   $nombre = $_POST["NAME"];
//   $usuario = $_POST["USERNAME"];
//   $email = $_POST["EMAIL"];
//   $clave = $_POST["PASSWORD"];

//   $sql = $conn->connect()->query(
//     "SELECT * FROM user 
//     WHERE username='$usuario' || email='$email'"
//   );
//   if ($sql->fetch_object()) {
//     header("location:registro.php");
//   } else {
    
//     $cript = password_hash($_POST["PASSWORD"], PASSWORD_BCRYPT); 
//     $objUser = new User;
//     // $objUser->InsertarUsuario(3, $nombre, $usuario, $email, $cript, 2, "");
//     header("location:login.php");
//   }
// }

// $objUser = new User;
// $objUser->InsertarUsuario(6,"pepe","pepitoo","pee@gmail.com","00",2,"");
?>