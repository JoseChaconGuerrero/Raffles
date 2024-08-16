<?php
include('../servi/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["number"])) {
    $id = $_GET["number"];
    $title = $_POST["title"];

    $price = $_POST["price_per_numbers"];
    $description = $_POST["description"];
    $date = $_POST["date"];
   

    if (isset($_FILES["image"]['name'])) {
        $img          = $_FILES["image"]['name'];
        $file_loc    = $_FILES['image']['tmp_name'];
        $mimeType    = $_FILES["image"]["type"];

        $fileExtension  = substr(strrchr($img, '.'), 1);
        $logitudpass     = 10;
        $newname         = substr(md5(microtime()), 1, $logitudpass);
        $image         = $newname . '.' . $fileExtension;

        //Verificando si existe el directorio de lo contarios lo creamos el Directorio
        $directorio = "../assets/raffle";
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $dir            = opendir($directorio);
        $target_path     = $directorio . '/' . $image;
        //Moviendo imagen de Perfil
        if (move_uploaded_file($file_loc, $target_path)) {
            $Q = "UPDATE raffles SET  title = '$title',
            description = '$description',
            date = '$date',
            image = '$image',
            price_per_number = $price WHERE id=$id";
            mysqli_query($con, $Q);
        }
    }

    $Q = "UPDATE raffles SET  title = '$title',
    description = '$description',
    date = '$date',
    price_per_number = $price WHERE id=$id";
    mysqli_query($con, $Q);



    header("location: ../admin/rifas.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET["number"])) {
    $title = $_POST["title"];
    $qty = $_POST["qty_numbers"];
    $price = $_POST["price_per_numbers"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $table_numbers = $_POST["table_numbers"];
    $table_tickets = $_POST["table_tickets"];

    $img          = $_FILES["image"]['name'];
    $file_loc    = $_FILES['image']['tmp_name'];
    $mimeType    = $_FILES["image"]["type"];

    $fileExtension  = substr(strrchr($img, '.'), 1);
    $logitudpass     = 10;
    $newname         = substr(md5(microtime()), 1, $logitudpass);
    $image         = $newname . '.' . $fileExtension;


    //Verificando si existe el directorio de lo contarios lo creamos el Directorio
    $directorio = "../assets/raffle";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $dir            = opendir($directorio);
    $target_path     = $directorio . '/' . $image;

    //Moviendo imagen de Perfil
    if (move_uploaded_file($file_loc, $target_path)) {
        $Q = "INSERT INTO raffles (title, description, date, image, qty_numbers, price_per_number)
        VALUES ('$title', '$description', '$date', '$image', $qty, $price)";
        mysqli_query($con, $Q);

        $lastID = mysqli_insert_id($con);

        $consulta = "SELECT * FROM raffles WHERE id = $lastID";
        $result = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($result)) {
            $id = $fila["id"];

            $create_numbers = "CREATE TABLE $table_numbers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            number INT NOT NULL,
            status VARCHAR(10) DEFAULT 'activate')";

            if (mysqli_query($con, $create_numbers)) {
                for ($i = 0; $i < $qty; $i++) {
                    $sql = "INSERT INTO $table_numbers (number, status) VALUES ($i, 'activate')";
                    if ($con->query($sql) !== TRUE) {
                        echo "Error al insertar registro: " . $con->error;
                    }
                }
            };

            $create_tickets = "CREATE TABLE $table_tickets (
            numero INT PRIMARY KEY,
            id_user INT,
            FOREIGN KEY (numero) REFERENCES $table_numbers(id),
            FOREIGN KEY (id_user) REFERENCES users(id));";

            mysqli_query($con, $create_tickets);

            $Q = "INSERT INTO `table_raffle` (`id_raffle`, `table_numbers`, `table_tickets`)
            VALUES ('$id', '$table_numbers', '$table_tickets')";
            $conexion = mysqli_query($con, $Q);
        }
        header("location: ../admin/rifas.php");
    }
}
