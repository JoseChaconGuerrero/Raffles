<?php
$idConectado        = $_SESSION['id'];
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"> <img src="../assets/img/sports.png" alt="Bootstrap" width="50" height="44"></a>
        <div class=" justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="../servi/acciones/salir.php?id=<?php echo $idConectado; ?>">
                    Salir
                </a>
            </div>
        </div>
    </div>
</nav>