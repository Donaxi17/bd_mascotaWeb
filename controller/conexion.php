<?php 

    class Conexion
    {
        public function connect()
        {
            $mysqli = new mysqli($_ENV['SERVER'], $_ENV['USER'], $_ENV['PASS'], $_ENV['DATABASE'], $_ENV['PORT']);
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL:" . $mysqli->connect_error;
            }
            else {
                echo "Conexion exitosa";
            }
            return $mysqli;
        }
    }

?>