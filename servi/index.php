<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
if (isset($_SESSION['id'])) {
  header("Location: home.php");
}

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
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/loader.css">
  <link rel="stylesheet" href="./assets/css/picnic.min.css">
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
  <section class="mi_wallper">
    <div id="demo-content">
      <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
      <div id="content"> </div>
    </div>

    <div class="login">
      <div class="login-container">
        <div class="login-box">
          
          <p class="login-title">Accede a nuestro <br> chat</p>
          <form class="form-login" action="acciones/process_login.php" method="POST">
            <div class="group">
              <label>Numero</label>
              <input type="text" placeholder="Coloque su nombre de" name="number" required>
            </div>
            <div class="group">
              <label>Contraseña</label>
              <input type="password" placeholder="Coloque su contraseña" name="password" required>
            </div>
            <div class="group" style="display:flex;">
              <button id="enviar" type="submit">Entrar</button>
            </div>
          </form>
          <div class="no-register">
            <h4>¿No estas registrado? <a href="./registerUser.php" class="no-register">Registrate</a></h4>
            
          </div>
        </div>

        <div class="login-desc">
          <div class="title">
            <img src="../assets/img/sports.png" alt="">
         
          </div>
         
        </div>
      </div>
    </div>
  </section>

  <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="assets/js/login.js"></script>


</body>

</html>