<?php
header("Content-Type: text/html;charset=utf-8");
include('config/config.php');
$idConectado  = $_REQUEST['id'];
mysqli_query($con, "UPDATE `users` SET `estatus`='Conectado' WHERE id = '$idConectado'") or die(mysqli_error($con));
$QueryUserClick = ("SELECT UserIdSession,clickUser FROM clickuser WHERE UserIdSession='$idConectado' LIMIT 1 ");
$QueryClick     = mysqli_query($con, $QueryUserClick);

$UserIdSession  = mysqli_fetch_array($QueryClick);
$clickUser      = $UserIdSession['clickUser'];

$Msjs = ("SELECT * FROM msjs WHERE (user_id ='" . $idConectado . "' AND to_id='" . $clickUser . "') OR (user_id='" . $clickUser . "' AND to_id='" . $idConectado . "') ORDER BY id ASC");
$QueryMsjs = mysqli_query($con, $Msjs);
while ($UserMsjs = mysqli_fetch_array($QueryMsjs)) {
  $archivo = $UserMsjs['archivos'];
  $explode = explode('.', $archivo);
  $extension_arch = array_pop($explode);

  if ($idConectado == $UserMsjs['user_id']) { ?>
<div class="row message-body">
    <div class="col-sm-12 message-main-sender">
        <div class="sender">
            <div class="message-text">

                <?php
           if (!empty($UserMsjs['message'])) {
             echo $UserMsjs['message'];
           } else if(!empty($archivo)) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <p style='font-weight: bold; color: #444;'>Ha mandado un nuevo archivo: </p>
                        <a class="boton_desc" download="" href="archivos/<?php echo $archivo; ?>"
                            title="Descargar Imagen"> <?=$archivo?>
                        </a>
                    </div>
                </div>
                <?php } else if(!empty($imagen)){
             ?>
                <img src="<?php echo 'archivos/' . $imagen; ?>" style="width: 100%; max-width: 250px;">
                <div class="row">
                    <div class="col-md-12">
                        <a class="boton_desc" download="" href="archivos/<?php echo $imagen; ?>"
                            title="Descargar Imagen">Descargar
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
           } else if(!empty($archivo)) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <p style='font-weight: bold; color: #444;'>Ha mandado un nuevo archivo: </p>
                        <a class="boton_desc" download="" href="archivos/<?php echo $archivo; ?>"
                            title="Descargar Imagen"> <?=$archivo?>
                        </a>
                    </div>
                </div>
                <?php } else if(!empty($imagen)){
             ?>
                <img src="<?php echo 'archivos/' . $imagen; ?>" style="width: 100%; max-width: 250px;">
                <div class="row">
                    <div class="col-md-12">
                        <a class="boton_desc" download="" href="archivos/<?php echo $imagen; ?>"
                            title="Descargar Imagen">Descargar
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
} ?>