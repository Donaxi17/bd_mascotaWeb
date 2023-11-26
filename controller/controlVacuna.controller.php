<?php

require_once(__DIR__ . "/../model/controlVacuna.model.php");
require_once(__DIR__ . "./conexion.php");

class ControlVacunaController extends Conexion

{
    public function getControlVacuna(): array{

        $conexion = $this->connect();
        $array = [];
        $idRepetido = [];
        $cont = 0;

        $result = $conexion->query("SELECT Mascota_id, Vacuna_id, fecha FROM controlvacuna");
        while ($row = $result->fetch_assoc()) {
            $data = new ControlVacuna;

            // $idRepetido[] = $row["Mascota_id"];
            // if ($cont > 0) {
            //     foreach ($idRepetido as $value) {

            //     }
            // }
            $data->mascotaId = $row["Mascota_id"];
            $data->vacunaId = $row["Vacuna_id"];
            $data->fecha = $row["fecha"];
            // $idRepetido = $row["Mascota_id"];
            $array[] = $data;
            // $cont++;
        }
        $conexion->close();
        return $array;
    }

    public function getNombreVacunaId($id){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT nombre FROM vacuna WHERE id = $id");
        $row = $result->fetch_assoc();
        return $row["nombre"];
    }

    public function InsertControlVacuna(ControlVacuna $ControlVacuna){

        $conexion = $this->connect();
        $mascotaId = $ControlVacuna->mascotaId;
        $vacunaId = $ControlVacuna->vacunaId;
        $fecha = $ControlVacuna->fecha;
        $conexion->query("INSERT INTO controlvacuna (Mascota_id,Vacuna_id,fecha) VALUES ($mascotaId, $vacunaId,'$fecha')");
        $conexion->close();
    }

    // public function InsertControlVacuna(){

    //     $conexion = $this->connect();

    //     $sql = "INSERT INTO `controlvacuna` (`Mascota_id`, `Vacuna_id`, `fecha`) VALUES (165, 16, NULL);";
    //     $conexion->query($sql);
    //     $conexion->close();
    // }

    public function EliminarControlVacuna($id){

        $conexion = $this->connect();

        $conexion->query("DELETE FROM controlvacuna WHERE Mascota_id = $id;");
        $conexion->close();
    }


}