<?php

require_once(__DIR__ . "/../model/vacuna.model.php");
require_once(__DIR__ . "./conexion.php");

class VacunaController extends Conexion

{
    public function getVacuna(): array{

        $conexion = $this->connect();
        $array = [];

        $result = $conexion->query("SELECT id, nombre FROM vacuna");
        while ($row = $result->fetch_assoc()) {
            $data = new Vacuna;
            $data->id = $row["id"];
            $data->nombre = $row["nombre"];
            $array[] = $data;
        }
        $conexion->close();
        return $array;
    }

    public function InsertVacuna(Vacuna $vacuna){

        $conexion = $this->connect();
        $nombre = $conexion->real_escape_string($vacuna->nombre);
        $conexion->query("INSERT INTO vacuna (nombre) VALUES ('$nombre')");
        $conexion->close();
    }

    public function DeleteVacuna(Vacuna $vacuna){

        $conexion = $this->connect();
        $nombre = $conexion->real_escape_string($vacuna->id);
        $conexion->query("DELETE FROM vacuna WHERE id = '$nombre'");
        $conexion->close();
    }

    public function UpdateVacuna(Vacuna $vacuna){

        $conexion = $this->connect();
        $id = $conexion->real_escape_string($vacuna->id);
        $nombre = $conexion->real_escape_string($vacuna->nombre);
        $conexion->query("UPDATE vacuna SET nombre = '$nombre' WHERE id = '$id'");
        $conexion->close();
    }
    
}

?>