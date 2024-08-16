<?php
include('../servi/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["number"])) {
    $number = $_GET["number"];
    $q = "SELECT * FROM table_raffle WHERE id_raffle = $number";
    $result = mysqli_query($con, $q);
    $data = mysqli_fetch_assoc($result);
    $table_name = $data["table_numbers"];

    $consulta = ("SELECT * FROM $table_name");
    $result = mysqli_query($con, $consulta) or die(mysqli_error($con));;

    $numbers = array();
    if ($result->num_rows > 0) {
        while ($row = $Data = mysqli_fetch_assoc($result)) {
            $numbers[] = $row;
        }
    }

    echo json_encode($numbers);
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $consulta = ("SELECT * FROM `granrifa_numbers`");
        $result = mysqli_query($con, $consulta) or die(mysqli_error($con));;

        $numbers = array();
        if ($result->num_rows > 0) {
            while ($row = $Data = mysqli_fetch_assoc($result)) {
                $numbers[] = $row;
            }
        }

        echo json_encode($numbers);
    }
}
