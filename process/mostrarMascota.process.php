<?php

require_once(__DIR__ . "../../controller/mascota.controller.php");
require_once(__DIR__ . "../../controller/tipoMascota.controller.php");
require_once(__DIR__ . "../../controller/raza.controller.php");
require_once(__DIR__ . "../../controller/user.controller.php");

$objMascota = new MascotaController;
$objTipoMascota = new TipoMascotaController;
$objRaza = new RazaController;
$objUser = new UserController;


$sql = $objMascota->getMascotas();

if ($sql->num_rows > 0) {
    $razaArray = $sql->fetch_all(MYSQLI_ASSOC);
    $cantidad = array();
    foreach ($razaArray as $raza) {
        $id = $raza['id'];
        echo "<br>";
        echo "<p class='filasConsulta'>" .
        '<span class="nombreMascota">' . $raza['nombre'] . ' </span>' .
        '<span>' . $raza['FechaNacimiento'] . '</span>' .
        '<span>' . $objUser->getNombreUser($raza['User_id']) . '</span>' .
        '<span>' . $objTipoMascota->getTipoMascota($raza['TipoMascota_id']) . '</span>' .
        '<span class="razaMascota">' . $objRaza->getNombreRaza($raza['Raza_id']) . '</span>' .
        "<span>" .
            "<button class='btnEditar' name='editar' value='$id' id='btnEditar'>Editar</button>" .
            "<button class='btnEliminar' type='submit' name='eliminar' value='$id'>Eliminar</button>" .
        "</span><br></p>";

        $cantidad[] = $id;
    }

} else {
    echo "No se encontraron resultados.";
}

?>