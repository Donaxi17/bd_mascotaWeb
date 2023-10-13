
<?php

    // require_once __DIR__ . './controller/conexion.php';

    class User
    {
        public int $id;
        public string $nombre;
        public string $userName;
        public string $email;
        public string $clave;
        public int $roleId;
        public $foto;

        public $conexion;

        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function InsertarUsuario(int $id, string $nombre, string $userName, string $email, string $clave, int $roleId, string $foto)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->userName = $userName;
            $this->email = $email;
            $this->clave = $clave;
            $this->roleId = $roleId;
            $this->foto = $foto;

            $sql = "INSERT INTO user (id,nombre,username,email,clave,Role_id,foto) 
            VALUES (?,?,?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrDate = array($this->id,$this->nombre,$this->userName,$this->email,$this->clave,$this->roleId,$this->foto);
            $resInsert = $insert->execute($arrDate);
        }

        public function getUsuarios()
        {
            $sql = "SELECT * FROM user";
            $execute = $this->conexion->query($sql);
            $resul = $execute->fetch_all(PDO::FETCH_ASSOC);
            return $resul;
        }
    }

?>