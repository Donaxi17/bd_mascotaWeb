<?php

require_once(__DIR__ . "/../model/user.model.php");
require_once(__DIR__ . "./conexion.php");

class UserController extends Conexion
{
    public function createUser(User $user)
    {
        $conexion = $this->connect();
        
        $nombre = $conexion->real_escape_string($user->nombre);
        $userName = $conexion->real_escape_string($user->userName);
        $email = $conexion->real_escape_string($user->email);
        $clave = $conexion->real_escape_string($user->clave);

        $conexion->query("INSERT INTO user (nombre,username,email,clave,Role_id) VALUES ('$nombre','$userName','$email','$clave',1)");
        $conexion->close();
    }

    // public function deleteUser($id){

    //     $conexion = $this->connect();

    //     $sql = $conexion->query("DELETE FROM user WHERE id = $id;");
        
    //     if ($sql === TRUE) {
    //         echo "Registro eliminado con éxito";
    //     } else {
    //         echo "Error al eliminar el registro: " . $conexion->error;
    //     }

    //     $conexion->close();
    // }
    
    // public function UpdateUser($nuevo_nombre, $nuevo_email, $id_a_actualizar){
       
    //     $conexion = $this->connect();

    //     $sql = $conexion->query("UPDATE user SET username = '$nuevo_nombre', email = '$nuevo_email' WHERE id = $id_a_actualizar");

    //     if ($sql === TRUE) {
    //         echo "Registro actualizado con éxito";
    //     } else {
    //         echo "Error al actualizar el registro: " . $conexion->error;
    //     }

    //     $conexion->close();
    // }

    public function getNombreUser($id){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT nombre FROM user WHERE id = $id");
        $row = $result->fetch_assoc();
        $conexion->close();
        return $row["nombre"];
        
    }

    public function getNombreUser2(){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT id, nombre FROM user");
        $row = $result->fetch_assoc();
        $conexion->close();
        return $row;
        
    }

    public function getUserId($username){

        $conexion = $this->connect();
        $result = $conexion->query("SELECT id FROM user WHERE username = '$username'");
        $row = $result->fetch_assoc();
        $conexion->close();
        return $row["id"];
        
    }

    public function getUser(): array{

        $conexion = $this->connect();
        $array = [];

        $result = $conexion->query("SELECT id, nombre FROM user");
        while ($row = $result->fetch_assoc()) {
            $data = new User;
            $data->id = $row["id"];
            $data->nombre = $row["nombre"];
            $array[] = $data;
        }
        $conexion->close();
        return $array;
    }

    public function UpdateUserName($nombre, $id){

        $conexion = $this->connect();

        $sql = "UPDATE user SET nombre = '$nombre' WHERE id = '$id'";
        $conexion->query($sql);
        $conexion->close();
    }

}

?>