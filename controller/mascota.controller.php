<?php

require_once(__DIR__ . "/../model/mascota.model.php");
require_once(__DIR__ . "./conexion.php");

class MascotaController extends Conexion
{
    public function getCantidadRaza()
    {
        $conexion = $this->connect();

        $sql = "SELECT COUNT('id') as cantidad FROM raza";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();
        $cantidad = $row["cantidad"];
    }

    public function getCantidadMascota($RazaId){

        $conexion = $this->connect();

        $sql = $conexion->query("SELECT COUNT(*) AS cantidad FROM mascota WHERE Raza_id = $RazaId");
        $row = $sql->fetch_assoc();
        return $row["cantidad"];
    }

    public function getExiUser($userId){

        $conexion = $this->connect();

        $sql = $conexion->query("SELECT COUNT(*) AS cantidad FROM mascota WHERE User_id = $userId");
        $row = $sql->fetch_assoc();
        return $row["cantidad"];
    }

    public function getCantidadVacuna($MascotaId){

        $conexion = $this->connect();

        $sql = $conexion->query("SELECT COUNT(*) AS cantidad FROM controlvacuna WHERE Mascota_id = $MascotaId");
        $row = $sql->fetch_assoc();
        return $row["cantidad"];
    }

    public function getNombreRaza() {

        $conexion = $this->connect();
        return $conexion->query("SELECT nombre FROM raza");
    }


    public function getMascotas() {

        $conexion = $this->connect();
        return $conexion->query("SELECT * FROM mascota");
    }

    public function InsertMascota(Mascota $mascota){
       
        $conexion = $this->connect();

        $nombre = $mascota->nombre;
        $fechaNacimiento = $mascota->fechaNacimiento;
        $userId = $mascota->userId;
        $tipoMascotaId = $mascota->tipoMascotaId;
        $RazaId = $mascota->RazaId;

        $sql = "INSERT INTO mascota (nombre,FechaNacimiento,User_id,TipoMascota_id,Raza_id) VALUES ('$nombre', '$fechaNacimiento', '$userId', '$tipoMascotaId', '$RazaId')";
        $conexion->query($sql);
        $conexion->close();
    }

    public function InsertMascota2($nombre, $fechaNacimiento, $amo, $tipoMascotaId, $RazaId){
       
        $conexion = $this->connect();

        $sql = "INSERT INTO mascota (nombre,FechaNacimiento,User_id,TipoMascota_id,Raza_id) VALUES ('$nombre', '$fechaNacimiento', '$amo', '$tipoMascotaId', '$RazaId')";
        $conexion->query($sql);
        $conexion->close();
    }

    public function EditarMascota($nombre, $fecha, $tipoMascota, $raza, $id){
       
        $conexion = $this->connect();

        $conexion->query("UPDATE mascota SET nombre = '$nombre', FechaNacimiento = '$fecha', TipoMascota_id = '$tipoMascota', Raza_id = '$raza' WHERE id = '$id'");
        $conexion->close();
    }

    
    public function Eliminar($id){

        $conexion = $this->connect();

        $conexion->query("DELETE FROM mascota WHERE id = $id;");
        $conexion->close();
    }

    public function Eliminar2(Mascota $mascota){

        $conexion = $this->connect();

        $conexion->query("DELETE FROM mascota WHERE User_id = $mascota->userId;");
        $conexion->close();
    }

    public function getNombreMascota($id){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT nombre FROM mascota WHERE id = $id");
        $row = $result->fetch_assoc();
        return $row["nombre"];
    }

    public function getUserId($id){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT User_id FROM mascota WHERE id = $id");
        $row = $result->fetch_assoc();
        return $row["User_id"];
    }

    public function getMascota($userId): array{

        $conexion = $this->connect();
        $array = [];

        $result = $conexion->query("SELECT nombre,FechaNacimiento,TipoMascota_id,Raza_id FROM mascota WHERE User_id = '$userId'");
        while ($row = $result->fetch_assoc()) {
            $data = new Mascota;
            $data->nombre = $row["nombre"];
            $data->fechaNacimiento = $row["FechaNacimiento"];
            $data->tipoMascotaId = $row["TipoMascota_id"];
            $data->RazaId = $row["Raza_id"];
            $array[] = $data;
        }
        $conexion->close();
        return $array;
    }

    public function getMascotaNombres(): array{

        $conexion = $this->connect();
        $array = [];

        $result = $conexion->query("SELECT id, nombre FROM mascota");
        while ($row = $result->fetch_assoc()) {
            $data = new User;
            $data->id = $row["id"];
            $data->nombre = $row["nombre"];
            $array[] = $data;
        }
        $conexion->close();
        return $array;
    }

    public function UpdateMascota(Mascota $mascota){

        $conexion = $this->connect();
        $id = $mascota->id;
        $nombre = $mascota->nombre;
        $fecha = $mascota->fechaNacimiento;
        $tipoMascotaId = $mascota->tipoMascotaId;
        $RazaId = $mascota->RazaId;
        $conexion->query("UPDATE mascota SET nombre = '$nombre', FechaNacimiento = '$fecha', TipoMascota_id = '$tipoMascotaId', Raza_id = '$RazaId' WHERE User_id = '$id'");
        $conexion->close();
    }
}

?>