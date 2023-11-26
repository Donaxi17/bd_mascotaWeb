<?php

require_once(__DIR__ . "/../model/raza.model.php");
require_once(__DIR__ . "./conexion.php");

class RazaController extends Conexion
{

    public function InsertarRaza(Raza $raza)
    {
        $conexion = $this->connect();

        $nombre = $raza->nombre;
        $TipoMascota_Id = $raza->TipoMascota_Id;

        $conexion->query("INSERT INTO raza (nombre,TipoMascota_Id) VALUES ('$nombre', '$TipoMascota_Id')");
        $conexion->close();
    }

    public function InsertarRaza2($nombre, $TipoMascota_Id)
    {
        $conexion = $this->connect();

        $conexion->query("INSERT INTO raza (nombre,TipoMascota_Id) VALUES ('$nombre', '$TipoMascota_Id')");
        $conexion->close();
    }

    public function getNombreRaza($id){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT nombre FROM raza WHERE id = $id");
        $row = $result->fetch_assoc();
        return $row["nombre"];
    }

    public function UpdateRaza($nombre, $id){

        $conexion = $this->connect();
        $sql = "UPDATE raza SET nombre = '$nombre' WHERE id = '$id'";
        $conexion->query($sql);
        $conexion->close();
    }

    public function getRaza(): array{

        $conexion = $this->connect();
        $array = [];

        $result = $conexion->query("SELECT id, nombre FROM raza");
        while ($row = $result->fetch_assoc()) {
            $data = new Raza;
            $data->id = $row["id"];
            $data->nombre = $row["nombre"];
            $array[] = $data;
        }
        $conexion->close();
        return $array;
    }

}


?>