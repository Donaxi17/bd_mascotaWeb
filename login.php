<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/login.css">
    <title>Login</title>
  </head>

  <body>
    <main>
      <form action="./inicioSession.php" method="post">
        <h2>Login Acceso</h2>
        <div class="input__login">
          <p>USERNAME</p>
          <input type="text" name="USERNAME" require>
        </div>
        <div class="input__login">
          <p>PASSWORD</p>
          <input type="text" name="PASSWORD" require>
        </div>
        <div class="Remember__Me">
          <div>
            <input type="checkbox" name="" id="check">
            <label for="check">Remember Me</label>
          </div>
          <a href="">Forgot Password?</a>
        </div>
        <button type="submit" name="enviar">Login in</button>
      </form>
      
      <?php 
        require_once(__DIR__ . './controller/conexion.php');
      ?>
    </main>
  </body>

</html>