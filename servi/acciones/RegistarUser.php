<?php
include('../config/config.php');

//Limpiando input
$nombre_apellido = ($_REQUEST['nombre_apellido']);
//Limpiando campo number para evitar inyeccion SQL

$number 	 = ($_REQUEST['number']);


$pass 		 = trim($_POST['password']); //Quitando algun espacio en blanco

//Moviendo imagen de Perfil
	//Si la Imagen se gusdao el en directorio, creamos un insert del Registro
	$hora   		= date('h:i a', time() - 3600 * date('I'));
	$fecha  		= date("d/m/Y");
	$fechaRegistro 	= $fecha . " " . $hora;
	$estatus 		= "Connected";

	$PasswordHash = password_hash($pass, PASSWORD_BCRYPT); //Incriptando clave,
	$sql_insert = ("INSERT INTO 
		users (
			number,
			password,
			nombre_apellido,
			fecha_registro,
			estatus
		) 
	VALUES (
			'$number',
			'$PasswordHash',
			'$nombre_apellido',
			'$fechaRegistro',
			'$estatus'
			)");
	$result_insert = mysqli_query($con, $sql_insert);
	if ($result_insert > 0) {
		echo '<meta http-equiv="refresh" content="0;url=../">';
	}

?><?php
