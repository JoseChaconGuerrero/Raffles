<?php
include('../servi/config/config.php');
include("./header.php");
include("./sidebar.php");

if (isset($_GET["number"])) {
    $number = $_GET["number"];
    $q = "SELECT * FROM raffles WHERE id=$number";
    $result = mysqli_query($con, $q);
    $data =  mysqli_fetch_assoc($result);
    $t = $data["title"];

    $description = $data["description"];
    $date = $data["date"];
    $qty = $data["qty_numbers"];
    $price = $data["price_per_number"];

    $timestamp = strtotime($date);
    $fechaHoraISO8601 = date('Y-m-d\TH:i:s', $timestamp);

    $q = "SELECT * FROM table_raffle WHERE id_raffle = $number";
    $result2 = mysqli_query($con, $q);
    $data2 =  mysqli_fetch_assoc($result2);
}
?>
<link rel="stylesheet" href="../css/table_numbers.css">
<link rel="stylesheet" href="../css/table_admin.css">
<div class="content-wrapper">
    <i class="bi bi-caret-right-fill"></i>
    <div class="wrap">
        <div class="container">
            <h1 class="fs-3">Datos de la rifa</h1>
            <form action="../acciones/crear_rifa.php<?php if (isset($_GET["number"])) {
                                                        echo "?number=", $number;
                                                    } ?>" class="form" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="title" placeholder="Nombre" <?php if (isset($_GET["number"])) { ?> value="<?= $t ?>" <?php } ?> required>
                </div>
                <div class="form-group">
                    <input type="number" name="qty_numbers" placeholder="Cantidad de numeros" <?php if (isset($_GET["number"])) { ?> disabled value=<?= $qty ?> <?php } ?> required>
                </div>
                <div class="form-group">
                    <input type="number" name="price_per_numbers" placeholder="Precio por numeros" <?php if (isset($_GET["number"])) { ?> value=<?= $price ?> <?php } ?> required>
                </div>
                <div class="form-group">
                    <input type="datetime-local" name="date" placeholder="Fecha de finalizacion" <?php if (isset($_GET["number"])) { ?> value=<?= $fechaHoraISO8601 ?> <?php } ?> required>
                </div>
                <div class="form-group textarea">
                    <textarea type="text" name="description" placeholder="Descripcion" required> <?php if (isset($_GET["number"])) { ?> <?= $description ?> <?php } ?></textarea>
                </div>
                <div class="form-group image-input">
                    <input type="file" name="image" title="Elegir imagen" accept="image/*" <?php if (!isset($_GET["number"])) { ?>required<?php } ?>>
                </div>
                <?php if (!isset($_GET["number"])) { ?> <div class="title-group">
                        <h2 class="fs-4 fw-bold">AGREGA AL MENOS UNA LISTA DE NUMEROS</h2>

                    </div>
                    <div class="form-group">
                        <input type="text" name="table_numbers" placeholder="Tabla numeros" required <?php if (isset($_GET["number"])) { ?> value=<?= $data2["table_numbers"] ?> <?php } ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" name="table_tickets" placeholder="Tabla tickets" required <?php if (isset($_GET["number"])) { ?> value=<?= $data2["table_tickets"] ?> <?php } ?>>
                    </div> <?php } ?>
                <?php if (isset($_GET["number"])) { ?><div class="row">
                        <div class="get-number"><?= $_GET["number"] ?></div>
                        <div class="col-12 numbers-container">
                            <div class="d-flex justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <button class="page-link" onclick="previusPage()">
                                                <span aria-hidden="true">«</span>
                                            </button>
                                        </li>

                                        <div id="items" class="d-flex"></div>

                                        <li class="page-item">
                                            <button class="page-link" onclick="nextPage()">
                                                <span aria-hidden="true">»</span>
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div id="cuerpo">
                            </div>
                            <input type="hidden" name="selectedKeys" id="selectedKeys">
                            <button type="submit" class="btn btn-primary button-submit" id="number">Modificar numeros</button>
                        </div>
                    </div>
                <?php } ?>

                <button type="submit" class="btn btn-primary"><?php if (isset($_GET["number"])) {
                                                                    echo "Modificar Rifa";
                                                                } else {
                                                                    echo "Crear Rifa";
                                                                } ?></button>
            </form>
        </div>
    </div>
    <script src="../js/app_admin.js"></script>
</div>
<?php
include("./footer.php")
?>