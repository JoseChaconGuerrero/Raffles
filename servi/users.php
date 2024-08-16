<?php
session_start();
include('config/config.php');
if (isset($_SESSION['number']) != "") {
    $idConectado        = $_SESSION['id'];
    $number         = $_SESSION['number'];
    $NombreUsarioSesion = $_SESSION['nombre_apellido'];
    $cargoData =  $_SESSION['cargoAdm'];
    $QueryUsers = ("SELECT 
    id,
    number,
    cargo_sistema,
    nombre_apellido,
    fecha_session,
    estatus,
    fecha_session
  FROM users WHERE id !='$idConectado' ORDER BY estatus ASC ");
    $resultadoQuery = mysqli_query($con, $QueryUsers);
    /* date_default_timezone_set("America/Caracas");
  $hora = date('h:i a',time() - 3600*date('I'));
  $fecha = date("d/m/Y");
  $hora_actual_separada = explode(":", $hora);
  $fecha_actual_separada = explode("/", $fecha);
  $minutos = explode(" ", $hora_actual_separada[1]);
  
  //print_r($fecha_actual_separada)
  */
    mysqli_query($con, "UPDATE `users` SET `estatus`='Connected' WHERE id = '$idConectado' && `estatus` = 'Disconnected'") or die(mysqli_error($con));

?>

    <div class="status-bar"></div>
    <div class="row heading">
        <div class="col-sm-8 col-xs-8 heading-avatar">
            <div class="heading-avatar-icon">

                <strong id='userId' style="padding: 0px 0px 0px 20px;">
                    <?php echo $NombreUsarioSesion; ?>
                </strong>
            </div>
        </div>

        <div class="col-sm-1 col-xs-1 heading-compose  pull-right">
            <a href="acciones/salir.php?id=<?php echo $idConectado; ?>">
                <i class="zmdi zmdi-power" style="font-size: 25px;"></i>
            </a>
        </div>

        <div class="col-sm-1 col-xs-1  pull-right icohome">
            <a href="./home.php">
                <i class="zmdi zmdi zmdi-n-1-square white zmdi-hc-2x "></i>
            </a>
        </div>
        <?php
        if ($cargoData == 1) {
        ?>
            <div class="col-sm-1 col-xs-1  pull-right icohome">
                <a href="../admin/rifas.php">
                    <i class="zmdi zmdi zmdi-menu zmdi-hc-2x white"></i>
                </a>
            </div>
        <?php
        }
        ?>
        <div class="col-sm-1 col-xs-1  pull-right icohome">
            <a href="../index.php">
                <i class="zmdi zmdi-long-arrow-left zmdi-hc-2x white"></i>
            </a>
        </div>

    </div>
    <div class="row sideBar">
        <audio class="audio" style="display:none;">
            <source src="effect.mp3" type="audio/mp3">
        </audio>
        <?php
        while ($FilaUsers = mysqli_fetch_array($resultadoQuery)) {
            if ($cargoData == 1 || $FilaUsers['cargo_sistema'] == 1) {
                $id_persona     = $FilaUsers['id'];

                $separar_fecha = explode(" ", $FilaUsers['fecha_session']);

                $resultado = ("SELECT * FROM msjs WHERE user_id='$id_persona' AND  to_id='$idConectado'  AND leido='NO'");
                $re  = mysqli_query($con, $resultado);
                $numero_filas = mysqli_num_rows($re);
                $alarmaCantidad = 0;
                $alarmaQuery = ("SELECT * FROM msjs WHERE to_id='$idConectado'  AND sonido='NO'");
                $alarmaSend  = mysqli_query($con, $alarmaQuery);
                $alarmaCantidad = mysqli_num_rows($alarmaSend);
                if ($alarmaCantidad > 0) {
                    mysqli_query($con, "UPDATE `msjs` SET `sonido`='SI' WHERE to_id = '$idConectado'") or die(mysqli_error($con));
        ?>
                    <script>
                        function ReproducirSonido() {
                            $(".audio")[0].play();
                        }
                        ReproducirSonido();
                    </script>

                    <?php
                }
                // Registrar sonido del usuario 
                //Buscando los msjs que estan sin leer por dicho usuario en sesion.
                $no_leidos = '';
                if ($numero_filas > 0) {
                    $res = ("SELECT * FROM msjs WHERE user_id='$id_persona' AND leido='NO' ");
                    $ree  = mysqli_query($con, $res);
                    if ($cantMsjs = mysqli_num_rows($ree) > 0) { ?>
                        <div style="display:none;">
                        </div>

                <?php
                    }
                }
                $no_leidos = $numero_filas;

                ?>

                <div class="row sideBar-body" id="<?php echo $FilaUsers['id']; ?>">
                    <!-- <div class="col-sm-3 col-xs-3 sideBar-avatar">
                        <?php

                        $active  = mysqli_query($con, "SELECT estatus FROM users WHERE id='$id_persona'");
                        $data = mysqli_fetch_array($active);
                        ?>

                    </div> -->

                    <div class="col-sm-9 col-xs-9 sideBar-main">
                        <style>
                            .sideBar-body {
                                height: 80px;

                            }
                        </style>
                        <div class="row">
                            <div class="col-sm-8 col-xs-8 sideBar-name">
                                <span class="name-meta">
                                    <?php
                                    echo $FilaUsers['nombre_apellido'];
                                    ?>

                                </span>

                                <?php
                                if ($FilaUsers['cargo_sistema'] == 1) {
                                ?>
                                    <span class='isAdmin'>ADMINISTRATOR</span>
                                    <style>
                                        .isAdmin {

                                            font-size: 10px;
                                            font-weight: bold;
                                            margin-left: 5px;
                                            color: #080;

                                        }
                                    </style>
                                <?php
                                }
                                if ($FilaUsers['estatus'] != 'Disconnected') { ?>
                                    <p class='Connected' style='margin-left: 5px;'>Conectado </p>

                                <?php } else { ?>
                                    <p class='Disconnect' style='margin-left: 5px;'><?= $data[0] ?> </p>
                                <?php } ?>

                            </div>

                            <div class="col-sm-4 col-xs-4 pull-right sideBar-time" style="color:#93918f;">
                                <style>
                                    .Connected {
                                        color: #28a745;
                                        font-weight: bold;
                                        font-size: 13px;
                                    }

                                    .Disconnect {
                                        color: #aaa;
                                        font-weight: bold;
                                        font-size: 12px;
                                    }
                                </style>

                                <?php

                                if ($no_leidos != 0) {


                                ?>
                                    <span class="notification-counter">
                                        <?php echo $no_leidos; ?>
                                    </span>

                                <?php
                                }
                                ?>

                            </div>

                        </div>

                    </div>
                </div>
            <?php
            } // cierre de verificacion de admin
            ?>
        <?php } ?>
    </div>


    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $(".sideBar-body").on("click", function() {

                /**marcar el usuario selecciona**/

                $(this).addClass("seleccionado");

                var id = $(this).attr('id');
                var idConectado = "<?php echo $idConectado; ?>";
                var number = "<?php echo $number; ?>";
                var dataString = 'id=' + id + '&idConectado=' + idConectado + '&number=' + number;
                scroll.scrollTop = scroll.scrollHeight;
                var ruta = "UserSeleccionado.php";
                $('#capausermsj').html('<img src="assets/img/cargando.gif" class="ImgCargando"/>');
                $.ajax({
                    url: ruta,
                    type: "POST",
                    data: dataString,
                    success: function(data) {
                        $("#capausermsj").html(data);
                        $("#conversation").animate({
                            scrollTop: $(document).height()
                        }, 1000);
                    }
                });
                return false;
            });
        });


        $(function() {
            $(".heading-compose").click(function() {
                $(".side-two").css({
                    "left": "0"
                });
            });

            $(".newMessage-back").click(function() {
                $(".side-two").css({
                    "left": "-100%"
                });
            });
        });
    </script>

<?php } ?>