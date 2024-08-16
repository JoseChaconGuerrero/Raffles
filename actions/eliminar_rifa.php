<?php
include('../servi/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["number"])) {
    $id = $_GET["number"];
   
    $q = "SELECT * FROM `table_raffle` WHERE id_raffle= $id";
    $result = mysqli_query($con, $q);

    if($data = mysqli_fetch_assoc($result)){
        $numbers = $data["table_numbers"];
        $tickets = $data["table_tickets"];
        $delete = "DELETE FROM `table_raffle` WHERE id_raffle = $id";
        mysqli_query($con, $delete);
        $delete = "DELETE FROM `raffles` WHERE id = $id";
        mysqli_query($con, $delete);
        // $delete = "DROP TABLE $numbers";
        // mysqli_query($con, $delete);
        // $delete = "DROP TABLE $tickets";
        // mysqli_query($con, $delete);
    
    }

    header("location: ../admin/rifas.php");
}

?>