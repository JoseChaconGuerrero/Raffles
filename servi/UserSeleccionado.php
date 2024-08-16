<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sportsplaza - Chat</title>
    <style type="text/css" media="screen">
        .zmdi-mail-reply:hover {
            color: #00796B !important;
            cursor: pointer;
        }

        .zmdi-comment-image:hover {
            color: #00796B !important;
            cursor: pointer;
        }

        /**style para el boton examinar***/
        .uploadFile {
            visibility: hidden;
        }

        #uploadIcon {
            cursor: pointer;
        }

        .camara {
            font-size: 45px;
            float: right !important;
            margin-left: 1000px;
            margin-top: -5px;
        }

        .camara:hover {
            color: #333;
        }

        .fa-microphone:hover {
            cursor: pointer;
            color: #333;
        }
    </style>
</head>

<body>
    <?php
    header("Content-Type: text/html;charset=utf-8");

    include('config/config.php');
    $IdUser                 = $_REQUEST['id'];
    $idConectado            = $_REQUEST['idConectado'];
    $number             = $_REQUEST['number'];

    //Actualizando los mensajes no leidos ya que estoy entrando en mis mensajes
    if (!empty($IdUser)) {
        $leyendoMsj = ("UPDATE msjs SET leido = 'SI' WHERE  user_id='$IdUser' AND to_id='$idConectado' ");
        $queryLeerMsjs = mysqli_query($con, $leyendoMsj);
    }


    $QueryUserSeleccionado = ("SELECT * FROM users WHERE id='$IdUser' LIMIT 1 ");
    $QuerySeleccionado     = mysqli_query($con, $QueryUserSeleccionado);

    while ($rowUser = mysqli_fetch_array($QuerySeleccionado)) {
    ?>
        <div class="status-bar"> </div>
        <div class="row heading">
           
            <div class="col-sm-3 heading-name">
                <a class="heading-name-meta">
                    <?php echo $rowUser['nombre_apellido']; ?>
                </a>
            </div>
        </div>

        <div class="row message" id="conversation">
            <style>
                @media (max-width: 755px) {
                    .heading {
                        display: flex;
                    }

                    #conversation {
                        height: 600px;
                    }
                }
            </style>
            <?php
            $QueryByUser = ("SELECT * FROM users WHERE id='$idConectado' LIMIT 1 ");
            $QueryByUserData     = mysqli_query($con, $QueryByUser);
           
            $QueryUserClick = ("SELECT UserIdSession FROM clickuser WHERE UserIdSession='$idConectado' LIMIT 1");
            $QueryClick     = mysqli_query($con, $QueryUserClick);
            $veririficaClick = mysqli_num_rows($QueryClick);
            if ($veririficaClick == 0) {
                $InserClick = ("INSERT INTO clickuser (UserIdSession,clickUser) VALUES ('$idConectado','$IdUser')");
                $ResulInsertClick = mysqli_query($con, $InserClick);
            } else {
                $UpdateClick = ("UPDATE clickuser SET clickUser='$IdUser' WHERE UserIdSession='$idConectado'");
                $ResultUpdateClick = mysqli_query($con, $UpdateClick);
            }


            //Mostrando msjs deacuerdo al Usuario seleccionado
            $Msjs = ("SELECT * FROM msjs WHERE (user_id ='" . $idConectado . "' AND to_id='" . $IdUser . "') OR (user_id='" . $IdUser . "' AND to_id='" . $idConectado . "') ORDER BY id ASC");
            $QueryMsjs = mysqli_query($con, $Msjs);

            while ($UserMsjs = mysqli_fetch_array($QueryMsjs)) {

                $archivo = $UserMsjs['archivos'];

                if ($idConectado == $UserMsjs['user_id']) { ?>

                    <div class="row message-body">

                        <div class="col-sm-12 message-main-sender">
                            <div class="sender">
                                <div class="message-text">
                                    <?php
                                    if (!empty($UserMsjs['message'])) {
                                        echo $UserMsjs['message'];
                                    } else if (!empty($archivo)) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style='font-weight: bold; color: #444;'>Ha mandado un nuevo archivo: </p>
                                                <a class="boton_desc" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen"> <?= $archivo ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } else if (!empty($imagen)) {
                                    ?>
                                        <img src="<?php echo 'archivos/' . $imagen; ?>" style="width: 100%; max-width: 250px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="boton_desc" download="" href="archivos/<?php echo $imagen; ?>" title="Descargar Imagen">Descargar
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                                <span class="message-time pull-right">
                                    <?php echo $UserMsjs['fecha'];  ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row message-body">
                        <div class="col-sm-12 message-main-receiver">
                            <div class="receiver">
                                <div class="message-text">
                                    <?php
                                    if (!empty($UserMsjs['message'])) {
                                        echo $UserMsjs['message'];
                                    } else if (!empty($archivo)) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Ha mandado un archivo: </p>
                                                <a class="boton_desc" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen"> <?= $archivo ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } else if (!empty($imagen)) {
                                    ?>
                                        <img src="<?php echo 'archivos/' . $imagen; ?>" style="width: 100%; max-width: 250px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="boton_desc" download="" href="archivos/<?php echo $imagen; ?>" title="Descargar Imagen">Descargar
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                                <span class="message-time pull-right">
                                    <?php echo $UserMsjs['fecha'];  ?>
                                </span>
                            </div>
                        </div>
                    </div>

            <?php  }
            }
            ?>

        </div>



        <div class="row reply" id="formnormal">
            <form class="conversation-compose" id="formenviarmsj" name="formEnviaMsj">
                <input type="hidden" name="user_id" value="<?php echo $idConectado; ?>">
                <input type="hidden" name="to_id" value="<?php echo $rowUser['id']; ?>">
                <input type="hidden" name="user" value="<?php echo $number; ?>">
                <input type="hidden" name="to_user" value="<?php echo $rowUser['nombre_apellido']; ?> ">
                <input class="input-msg" name="message" id="message" placeholder="Escribe tu mensaje y presiona enter" autocomplete="off" autofocus="autofocus" required="true">
                <div class="circle-two">
                    <i class="zmdi zmdi-mail-send" title="Enviar mensaje"></i>
                </div>
                <i class="zmdi zmdi-comment-image" style="font-size: 45px; color: grey;" title="Send Image." id="mostrarformenviarimg"></i>
            </form>
        </div>
        <style>
            .circle-two {
                width: 50px;
                height: 50px !important;
                border-radius: 50px;
                color: #eee;
                background-color: #008a7c !important;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                margin-right: 20px;
                transition: 300ms;
            }

            .circle-two i {
                font-size: 25px;
                margin-left: 5px;
            }

            .circle-two:hover {
                background-color: #03a191 !important;
            }
        </style>
        <audio class="audio" style="display:none;">
            <source src="effect.mp3" type="audio/mp3">
        </audio>


        <div class="row reply" id="formenviaimg">
            <form class="conversation-compose" id="formenviarmsj" name="formEnviaMsj" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $idConectado; ?>">
                <input type="hidden" name="to_id" value="<?php echo $rowUser['id']; ?>">
                <input type="hidden" name="to_user" value="<?php echo $rowUser['nombre_apellido']; ?> ">
                <input type="hidden" name="user" value="<?php echo $number; ?>">


                <div class="col-sm-12 col-xs-12 reply-recording">
                    <label for="uploadFile" id="uploadIcon">
                        <i class="zmdi zmdi-camera camara"></i>


                    </label>
                    <label for="document_upload" class='archive'> <img src='./assets/img/archive.svg'></label>
                    <input style='display: none;' name='document_upload' id="document_upload" type="file">
                    <input type="file" name="namearchivo" value="upload" id="uploadFile" accept="image/png, image/jpeg, image/gif" class="uploadFile" />
                </div>

                <div class='components'>
                    <button class="send" name="enviar" id="botonenviarimg" name="botonenviarimg">
                        <div class="circle">
                            <i class="zmdi zmdi-mail-send" title="Enviar Imagen..."></i>
                        </div>

                    </button>
                    <i class="zmdi zmdi-mail-reply" style="font-size: 50px;color: grey;" id="volverformnormal" title="Volver . ."></i>
                </div>

            </form>
            <style>
                #capausermsj {
                    overflow: scroll !important;
                }

                @media (max-width: 755px) {
                    .app-one {
                        overflow: scroll !important;

                    }

                    #capausermsj {
                        overflow: scroll !important;
                    }

                    .heading {
                        display: flex;
                    }
                }

                .reply-recording {
                    background: #cecece !important;
                    width: 50%;
                }

                .archive {
                    position: absolute;
                    top: 5px;
                    left: 80px;
                    width: 40px;
                    height: 40px;
                    opacity: 0.5;
                    cursor: pointer;
                    transition: 300ms;
                }

                #formenviarmsj {
                    position: relative;
                    overflow: initial;
                }

                .components {
                    position: absolute;
                    right: 15px;
                    background: #cecece !important;
                }

                .components .send {
                    margin-bottom: 18px;
                    margin-right: 20px;
                    margin-top: -20px;

                }

                .components>i {
                    height: 20px;
                }

                .conversation-compose {
                    position: relative !important;
                    width: 100%;
                }

                @media (max-width: 755px) {
                    .conversation-compose button {
                        position: absolute;
                        top: 50px;

                    }

                    #uploadIcon {
                        width: 40px;
                        height: 40px;
                        margin-right: 20px;
                    }

                    .archive {
                        width: 30px;
                        height: 30px;
                    }

                    #formenviarmsj {
                        position: relative;
                    }

                    .components {
                        position: absolute;
                        right: 10px;
                        width: 250px;
                        height: 80px;
                    }

                    .components .send {
                        position: absolute;
                        right: 50px;
                        top: 15px;
                    }

                    .components>i {
                        position: absolute;
                        right: 10px;
                        top: 0px;
                    }

                    .archive:hover {
                        opacity: 0.9;
                    }
            </style>
        </div>
        <style>
            #uploadIcon {
                width: 50px;
                flex: 0.5 !important;
            }
        </style>
    <?php } ?>


    <script type="text/javascript">
        $(function() {
            scroll();

            var idConectado = "<?php echo $idConectado; ?>";

            //console.log('Id User: ' + idConectado);

            //Buscando mensajes nuevos cada 4 segundos
            function actualizar() {
                var valor = 0;
                var bucle = setInterval(function() {
                    valor++;
                    //console.log('Buscando mensajes sin leer ' + valor);
                    if (valor == 8) {
                        $.ajax({
                            type: "POST",
                            url: "buscarMensajesNuevos.php",
                            dataType: "json",
                            data: {
                                idConectado: idConectado
                            },
                            success: function(data) {
                                //console.log(data);
                                if (data.msj == true) {
                                    $.post('MsjsUsers.php', {
                                        id: idConectado
                                    }, function(data) {
                                        $('#conversation').html(data);
                                        var scrolltoh = $('#conversation')[0]
                                            .scrollHeight;
                                        $('#conversation').scrollTop(scrolltoh);
                                    })
                                    //console.log('si hay msjs');
                                } else {
                                    //console.log('no hay msjs');
                                }
                            }
                        })
                        valor = 0;
                    }
                }, 2000);
            }

            actualizar(); //Llamado a la funcion.
            $(".circle-two").click(() => {
                var url = "acciones/RegistMsj.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formenviarmsj").serialize(),
                    complete: function(data) {
                        scroll(); //llamando la funcion
                    },
                    success: function(data) {
                        $("#conversation").load('MsjsUsers.php?id=' + idConectado);
                        //$('#conversation').html(data);
                        $("#message").val(""); //limpiar el input del msg
                        $(".audio")[0].play(); //reproducir audio de envio
                        const scrolltoh = $('#conversation')[0].scrollHeight;
                        $('#conversation').scrollTop(scrolltoh);
                    }
                });
                return false;
            });

            $(".conversation-compose").keypress(function(e) {
                if (e.which == 13) {

                    var url = "acciones/RegistMsj.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formenviarmsj").serialize(),
                        complete: function(data) {
                            scroll(); //llamando la funcion
                        },
                        success: function(data) {
                            $("#conversation").load('MsjsUsers.php?id=' + idConectado);
                            //$('#conversation').html(data);
                            $("#message").val(""); //limpiar el input del msg
                            $(".audio")[0].play(); //reproducir audio de envio
                            const scrolltoh = $('#conversation')[0].scrollHeight;
                            $('#conversation').scrollTop(scrolltoh);
                        }
                    });
                    return false;
                }
            });


            $("#formenviaimg").hide();

            $("#mostrarformenviarimg").click(function() {
                $("#formnormal").hide();
                console.log('mostrando');
                $("#formenviaimg").show(200);
            });

            $("#volverformnormal").click(function() {
                $("#formenviaimg").hide();
                console.log('mostrando2');
                $("#formnormal").show(200);
            });

        });


        var enviandoImagen = false; // Variable para rastrear si se está enviando una imagen
        // Unir el evento clic al botón solo una vez en el documento cargado
        $('body').off('click', '#botonenviarimg').on('click', '#botonenviarimg', async function(e) {
            e.preventDefault();

            if (enviandoImagen) {
                return; // Si ya se está enviando una imagen, no hacer nada
            }

            enviandoImagen = true; // Establecer la bandera de envío de imagen

            const form = $(this).closest('form')[0];
            const formData = new FormData(form);
            const idConectado = "<?php echo $idConectado; ?>";

            // Validando que no envíen el formulario sin imagen
            const namearchivo = $("#uploadFile").val();
            if (!namearchivo) {
                const namearchivo = $("#document_upload").val();
                const IsArchive = 1;
                if (!namearchivo) {
                    alert('debes seleccionar una imagen.')
                    return;
                }
            }

            try {
                const response = await fetch('acciones/archivo.php', {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }

                const data = await response.text();
                $("#conversation").html(data);
                $(".audio")[0].play(); // Reproducir audio de envío

                // Volver al formulario de mensaje
                $("#formenviaimg").hide();
                $("#formnormal").show(200);

                // Actualizar conversación
                const updatedData = await $.post('MsjsUsers.php', {
                    id: idConectado
                });
                $('#conversation').html(updatedData);

                const scrolltoh = $('#conversation')[0].scrollHeight;
                $('#conversation').scrollTop(scrolltoh);

                // Restablecer la variable
                enviandoImagen = false;

                // Restablecer el formulario
                form.reset();
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>

</body>

</html>