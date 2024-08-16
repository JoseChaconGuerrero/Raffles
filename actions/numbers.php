<?php
include('../servi/config/config.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $number = $data["selectedKeys"];

    $userNumber = $_SESSION["number"];
    $userName = $_SESSION["nombre_apellido"];
    $IdUser              = $_SESSION['id'];

    date_default_timezone_set("America/Caracas");
    $hora             = date('h:i a', time() - 3600 * date('I'));
    $fecha            = date("d/m/Y");
    $FechaMsj         = $fecha . " " . $hora;
    $nombre_equipo_user = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    $to_id                   = 30;
    $para                 = "Admin";
    $leido                   = "NO";
    $msj                 = "Mi nombre es $userName y me gustaría participar en la rifa con el número $number. Puede contactarme al número de teléfono $userNumber.";

    if ($_SESSION["cargoAdm"] != 1) {
        if ($msj != '') {
            $NuevoMsj  = ("INSERT INTO msjs (user, user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido, sonido)
        VALUES ('$userName', '$IdUser', '$para', '$to_id', '$msj', '$FechaMsj', '$nombre_equipo_user', '$leido', 'NO')");
            $reg = mysqli_query($con, $NuevoMsj);
        }
    }

    $array = explode(',', $number);
    foreach ($array as $elemento) {
        $query = ("UPDATE `granrifa_numbers` SET `status`= CASE
        WHEN `status` = 'activate' THEN 'deactivate'
        WHEN `status` = 'deactivate' THEN 'activate'
        ELSE `status` END WHERE number = $elemento");
        $reg = mysqli_query($con, $query);
    }
}
