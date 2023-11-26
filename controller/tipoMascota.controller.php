<?php

require_once(__DIR__ . "/../model/tipoMascota.model.php");
require_once(__DIR__ . "./conexion.php");

class TipoMascotaController extends Conexion
{
    public function getTipoMascota($id){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT nombre FROM tipomascota WHERE id = $id");
        $row = $result->fetch_assoc();
        return $row["nombre"];
    }

    public function UpdateTipoMascota($nombre, $id){

        // $conexion = $this->connect();
        // $conexion->query("UPDATE tipomascota SET nombre = '$nombre' WHERE id = '$id'");
        // $conexion->close();

        $conexion = $this->connect();
        $sql = "UPDATE tipomascota SET nombre = '$nombre' WHERE id = '$id'";
        $conexion->query($sql);
        $conexion->close();
    }

    public function getTipoMascota2(): array{

        $conexion = $this->connect();
        $array = [];

        $result = $conexion->query("SELECT id, nombre FROM tipomascota");
        while ($row = $result->fetch_assoc()) {
            $data = new tipoMascota;
            $data->id = $row["id"];
            $data->nombre = $row["nombre"];
            $array[] = $data;
        }
        $conexion->close();
        return $array;
    }

    public function InsertTipoMascota($nombre){
        $conexion = $this->connect();

        $conexion->query("INSERT INTO tipomascota (nombre) VALUES ('$nombre')");
        $conexion->close();
    }

    
}

?>