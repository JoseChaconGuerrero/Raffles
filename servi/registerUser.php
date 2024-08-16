<?php
session_start();
header("Content-Type: text/html;charset=utf-8");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Chat - WhatApp,una sala para compartir mensajes, audios, imagenes, videos entre muchascosas mas.">
    <meta name="author" content="URIAN VIERA">
    <meta name="keyword" content="Web Developer Urian Viera">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
    <title>Chat - WhatApp - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/loader.css">
    <link rel="stylesheet" href="assets/css/picnic.min.css">
    <style type="text/css" media="screen">
        .miniprofile {
            border-radius: 50%;
            /* Make it a circle */
            margin: 0 auto;
            /* Center horizontally */
            width: 60%;
            /* 60% width */
            padding-bottom: 60%;
            /* 60% height */
        }

        .group label {
            font-size: 1.5rem;
            font-weight: 900;
        }
    </style>
</head>

<body>
    
    <section>
        <div class="login">
            <div class="login-container">
                <div class="login-box">
                    <p class="login-title">Registrar cuenta</p>
                    <form class="form-login" action="acciones/RegistarUser.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="group">
                            <label>Usuario</label>
                            <input type="text" placeholder="Coloque su nombre de" name="nombre_apellido" required>
                        </div>
                        <div class="group">
                            <label>Numero</label>
                            <input type="text" placeholder="Coloque su numero de telefono" name="number" required>
                        </div>
                        <div class="group">
                            <label>Contraseña</label>
                            <input type="password" placeholder="Coloque su contraseña" name="password" required>
                        </div>
                       
                        <div class="group" style="display: flex; margin-top:30px;">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>

    </section>
</body>