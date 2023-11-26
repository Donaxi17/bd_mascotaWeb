
<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once(__DIR__ . './controller/conexion.php');

$conn = new Conexion;
$conn->connect();

require_once(__DIR__ . './model/user.model.php');

// $objUser = new User;
// $objUser->InsertarUsuario(4,"pepe","pepitoo","pee@gmail.com","00",2,"");
// $xx = $objUser->getUsuarios();
// print_r("<pre>");
// print_r($xx);
// print_r("</pre>");
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Css/style.css">
  <link rel="icon" href="./img/img_index/logo.png">
  <script src="./Js/main.js" defer></script>
  <title>Dr. Vacunas</title>
</head>

<body>
  <header>
    <div class="logo_text">
      <img src="./img/img_index/logo.png" alt="">
      <h1>Dr. Vacunas</h1>
    </div>
    <div class="div_links">
      <ul>
        <a href="" class="link_inicio">Inicio</a>
        <a href="">Servicios</a>
        <a href="">Contacto</a>
        <div>
          <img src="./img/img_index/icono_login.png" alt="">
          <a href="./login.php"> Entrar</a>
        </div>
        <button type="submit">+57 302-453-4756</button>
      </ul>
    </div>
  </header>
  <main>
    <section class="primera_section">
      <h2>Amor y proteccíon</h2>
      <h3>Cuidando con Amor, Protegiendo con Vacunas</h3>
      <p>Veterinario Experto</p>
      <button type="submit">Programa tu vacuna</button>
    </section>
    <section class="segunda_section">
      <img src="./img/img_index/foto_principal.jpg" alt="">
    </section>
  </main>
  <section class="servicios">
    <h2>Servicios</h2>
    <div class="conten_section">
      <article>
        <div>
          <img src="./img/img_index/perro-lengua.jpg" alt="icono perro lengua">
        </div>
        <h3>Cuidado dental</h3>
        <p>Describe uno de nuestros servicio en esta area</p>
        <button type="submit">Reservar ahora</button>
      </article>
      <article>
        <div>
          <img src="./img/img_index/gato-blanco.jpg" alt="icono perro lengua">
        </div>
        <h3>Chequeo</h3>
        <p>Describe uno de nuestros servicio en esta area</p>
        <button type="submit">Reservar ahora</button>
      </article>
      <article>
        <div>
          <img src="./img/img_index/perrito-gafas.jpg" alt="icono perro lengua">
        </div>
        <h3>Peluquería</h3>
        <p>Describe uno de nuestros servicio en esta area</p>
        <button type="submit">Reservar ahora</button>
      </article>
    </div>
  </section>
  <section class="contacto">
      <h2>Contacto</h2>
      <article class="contato_informacion">
        <div>
          <h3>Teléfono</h3>
          <p>+57 302-453-4756</p>
        </div>
        <div>
          <h3>Emal</h3>
          <p>donaxjimenez00@gmail.com</p>
        </div>
        <div>
          <h3>Horario de trabajo</h3>
          <p>Lun - Vie:  9:00 - 20:00</p>
          <p>Sábado: 9:00 - 16:00</p>
        </div>
        <div>
          <h3>Area de servicio</h3>
          <p>Colombia y Mexico</p>
        </div>
      </article>
      <article class="contacto_inputs">
        <div>
          <input type="text" name="" id="" placeholder="Nombre">
          <input type="text" name="" id="" placeholder="Emal">
        </div>
        <input type="text" class="input_mensaje" name="" id="" placeholder="Escribe tu mensaje aquí...">
        <button type="submit">Enviar</button>
      </article>
  </section>
</body>

</html>
