<?php
include("./header.php");
include("./sidebar.php");
include('../servi/config/config.php');
$q = "SELECT * FROM raffles";
$result = mysqli_query($con, $q);
?>
<div class="content-wrapper home">
    <i class="bi bi-caret-right-fill"></i>
    <h1 class="fs-3">Rifas</h1>
    <a href="./agregar_rifas.php" class="btn btn-primary">Agregar Rifa</a>
    <div class="container">
        <table class="raffle">
            <thead>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th>ID rifa</th>
                        <th>Nombre</th>
                        <th>Cantidad de numeros</th>
                        <th>Precio por tickets</th>
                        <th>Modificar</th>
                    </tr>
                <?php
                }
                ?>

            </thead>
            <tbody>
                <?php
                include('../servi/config/config.php');
                $q = "SELECT * FROM raffles";
                $result = mysqli_query($con, $q);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th><?= $row["id"] ?></th>
                        <th><?= $row["title"] ?></th>
                        <th><?= $row["qty_numbers"] ?></th>
                        <th><?= $row["price_per_number"] ?></th>
                        <th class="modify"><a href="./agregar_rifas.php?number=<?= $row['id'] ?>"><i class="bi bi-app-indicator"></i> </a> <a href="../acciones/eliminar_rifa.php?number=<?= $row['id'] ?>"><i class="bi bi-x-circle-fill"></i> </a></th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include("./footer.php")
?>