<?php
include('../config/config.php');

$usuario = trim($_POST['number']);
$password = trim($_POST['password']);

$sqlVerificandoLogin = ("SELECT *  FROM users WHERE number COLLATE utf8_bin='$usuario'");
$resultLogin = mysqli_query($con, $sqlVerificandoLogin) or die(mysqli_error($con));;
$numLogin    = mysqli_num_rows($resultLogin);

if ($numLogin != 0) {
    while ($rowData  = mysqli_fetch_assoc($resultLogin)) {
        $passwordBD = $rowData['password'];
        /**
         * password_verify es una funcion de PHP que permite comprobar si la contraseña facilitada coincida con un hash, 
         * retorna una respuesta de tipo booleano es decir (1 - 0) (TRUE - FALSE)
         * ademas es capaz de encontrar la correspondencia entre cualquiera de los múltiples hash que puede generar password_hash 
         */

        if (password_verify($password, $passwordBD)) {
            session_start(); //Creando la sesion ya que los datos son validos
            $_SESSION['id']     = $rowData['id'];
            $_SESSION['number']    = $rowData['number'];
            $_SESSION['nombre_apellido']     = $rowData['nombre_apellido'];
            $_SESSION['imagen'] = $rowData['imagen'];
            $_SESSION['cargoAdm'] = $rowData['cargo_sistema'];
            $_SESSION['verificacion'] = $rowData['verificacion_correo'];
            //Actualizando la primera Hora del Login
            $activo = "Connected";
            $update_user_state = ("UPDATE users SET estatus='$activo' WHERE id='" . $_SESSION['id'] . "'");
            $result = mysqli_query($con, $update_user_state);

            // if ($_SESSION['verificacion'] == 0) {
            //     header("location: ../register2auth.php");
            // } else {

            //     header("location:../home.php");
            // }

            $paginaAnterior = $_SERVER['HTTP_REFERER'];

            // Redirige al usuario a la página anterior
            header("Location: $paginaAnterior");
        } else {
            //echo "Login incorecto";
            header("location:../");
        }
    }
} else {
    //echo "No existe el correo registrado";
    header("location:../");
}
