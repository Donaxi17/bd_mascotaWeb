<?php
    require_once __DIR__ . "/vendor/autoload.php";

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    require_once(__DIR__ . './controller/conexion.php');

    $conn = new Conexion;

    if (empty($_POST["USERNAME"]) || empty($_POST["PASSWORD"])) {
        echo "Los campos estan vacios";
    } 
    else {
        $usuario = $_POST["USERNAME"];
        $clave = $_POST["PASSWORD"];
        $sql=$conn->connect()->query(
            "SELECT * FROM user 
            WHERE username='$usuario' && clave='$clave'"
        );
        if ($datos=$sql->fetch_object()) {
            header("location:index.php");
        } else {
            header("location:login.php");
        }
        
    }


    // echo $_POST["USERNAME"];
    echo "<br> <br>";


?>
