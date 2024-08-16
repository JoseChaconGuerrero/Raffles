<link rel="stylesheet" type="text/css" href="../Complements/toastify.min.css">

<script type="text/javascript" src="../Complements/toastify.js"></script>
<?php
session_start();
header("Content-Type: text/html;charset=utf-8");

include('config/config.php');
if (isset($_SESSION['number']) != "") {
    $number    = $_SESSION['number'];
    $imgPerfil    = $_SESSION['imagen'];
    $idConectado  = $_SESSION['id'];
    // if($_SESSION['verificacion'] == 0){
    //   header("Location: ./register2auth.php");
    // }
    $sqlVerificandoLogin = ("SELECT id, nombre_apellido, estatus, fecha_session, cargo_sistema FROM users WHERE fecha_session != 'null'");
    $IsConnect = mysqli_query($con, $sqlVerificandoLogin) or die(mysqli_error($con));
    date_default_timezone_set("America/Caracas");
    $hora = date('h:i a', time() - 3600 * date('I'));
    $fecha = date("d/m/Y");
    $fechainicio = date("d/m/Y");
    $hora_actual_separada = explode(":", $hora);
    $fecha_actual_separada = explode("/", $fechainicio);
    $minutos = explode(" ", $hora_actual_separada[1]);
    $fecha_actual    = $fecha . " " . $hora;
    $number = $_SESSION['number'];
    $cargoAdmin = $_SESSION['cargoAdm'];
    mysqli_query($con, "UPDATE `users` SET `estatus`='Disconnected'") or die(mysqli_error($con));
    mysqli_query($con, "UPDATE `users` SET `fecha_session`='$fecha_actual' WHERE number = '$number'") or die(mysqli_error($con));
    //print_r($fecha_actual_separada); // 0 dia, 1 mes, 2 año.
    while ($rowData  = mysqli_fetch_assoc($IsConnect)) {
        $id_pass = $rowData['id'];
        $cargo = $rowData['cargo_sistema'];
        $datos_separados = explode(" ", $rowData['fecha_session']); // 0 fecha, 1 hora.
        $fecha_separadas = explode("/", $datos_separados[0]); // 0 dia, 1 mes, 2 año.
        if ($fecha_actual_separada[0] != $fecha_separadas[0]) continue;
        if ($fecha_actual_separada[1] != $fecha_separadas[1]) continue;
        if ($fecha_actual_separada[2] != $fecha_separadas[2]) continue;
        $horas_separadas = explode(":", $datos_separados[1]);
        if ($hora_actual_separada[0] != $horas_separadas[0]) continue;
        if ($datos_separados[2] != $minutos[1]) continue;
        if ($hora_actual_separada[0] != $horas_separadas[0]) continue;
        if ($minutos[0] >= $horas_separadas[1] + 5) continue;
        mysqli_query($con, "UPDATE `users` SET `estatus`='Connected' WHERE id = '$id_pass'") or die(mysqli_error($con));
        if ($id_pass == $idConectado) continue;
        if ($cargo == 0 || $cargo == '0') continue;
?>
        <script>
            setTimeout(() => {
                Toastify({
                    text: "The user <?= $rowData['nombre_apellido'] ?> is connected",
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        width: '300px',
                        height: '60px',
                        alignItems: 'center',
                        justifyContent: 'center',
                        display: 'flex',
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            }, 2000);
        </script>
    <?php

    }

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description">
        <meta name="author" content="URIAN VIERA">
        <title>Sportsplaza- Chats</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
        <link rel="stylesheet" src="https://fonts.googleapis.com/css?family=Roboto:400,700,300" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/home.css">
        <link rel="stylesheet" href="assets/css/inputEnviar.css">
        <link rel="stylesheet" href="../css/table_numbers.css">

        <style type="text/css" media="screen">
            .seleccionado {
                background-color: hsl(0, 0%, 90%);
            }
        </style>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">
    </head>

    <body>
        <script>
        </script>

        <div class="container app">
            <div class="row app-one">

                <!----Lista de usuarios------------>
                <div class="col-sm-4 side" id="myusers">
                    <div class="side-one">

                    </div>
                </div>

                <!-------->

                <!----contenedor del chat--->
                <div class="col-sm-8 conversation">
                    <div id="capausermsj">
                        <div class="row-numbers">
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
                                <form id="formulario" action="../acciones/numbers.php" method="POST">
                                    <input type="hidden" name="selectedKeys" id="selectedKeys">
                                    <?php
                                    if (isset($_SESSION["id"])) {
                                    ?>
                                        <button type="submit" class="button blue" id="number">Enviar</button>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="button-flex">
                                            <a class="button blue" href="./servi/index.php">Inicia sesion</a>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!---fin--->

            </div>
        </div>

        <script src="./assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function ThePageFinish() {
                var moreInformation = '<?php echo $cargoAdmin ?>';
                var idConectado = "<?php echo $idConectado; ?>";
                var number = "<?php echo $number; ?>";
                if ((moreInformation == 0 || moreInformation == '0')) {
                    $(".sideBar-body").removeClass("seleccionado");
                    var dataString = 'id=32' + '&idConectado=' + idConectado + '&number=' + number;
                    var ruta = "UserSeleccionado.php";
                    $.ajax({
                        url: ruta,
                        type: "POST",
                        data: dataString,
                        success: function(data) {
                            $("#capausermsj").html(data);
                        }
                    });
                    return false;
                }
            }
            $(function() {
                load2();

                function load2() {
                    setTimeout(() => {
                        ThePageFinish();
                    }, 5000);
                    window.setTimeout(async function() {
                        $.post('users.php', load_data, function(data) {
                            $('#myusers').html(data);
                            ca = document.cookie.split(';');
                            let cantScroll = ca[0].split('=');
                            let getScrollData = document.querySelector(".sideBar");

                            if (getScrollData) {
                                getScrollData.scrollTop = cantScroll[1];
                            }

                        });
                    }, 100);
                }

                $(function() {
                    async function cargarDatos() {
                        if ($(".side-one")[0]) {
                            users();
                        }
                        users();
                        setInterval(function() {
                            let getScrollData = document.querySelector(".sideBar");

                            if (getScrollData) {
                                let ScrollCreateCookie = document.cookie =
                                    `dataScroll=${getScrollData.scrollTop}`;
                            }

                            if ($(".side-one")[0]) {
                                users();
                            }
                            users();
                        }, 5000);
                    }
                    cargarDatos();
                });
                async function users() {
                    load_data = {
                        'fetch': 1
                    };
                    window.setTimeout(async function() {
                        $.post('users.php', load_data, function(data) {
                            $('#myusers').html(data);
                            ca = document.cookie.split(';');
                            let cantScroll = ca[0].split('=');
                            let getScrollData = document.querySelector(".sideBar");

                            if (getScrollData) {
                                getScrollData.scrollTop = cantScroll[1];
                            }
                        });
                    }, 5000);
                }
            });
        </script>


    </body>

    </html>
<?php } else {
    echo '<script type="text/javascript">
    alert("You need to log in");
    window.location.assign("index.php");
    </script>';
}
?>