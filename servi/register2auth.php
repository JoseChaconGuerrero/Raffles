<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
header("Content-Type: text/html;charset=utf-8");
include('./config/config.php');


require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

if(isset($_GET['generateToken']) && isset($_GET['emailUser'])){
$emailUser = $_GET['emailUser'];
$ThisToken = $_GET['generateToken'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$QueryUserToken = ("UPDATE `users` SET `token_user`='$ThisToken' WHERE email_user = '$emailUser'");
$QueryToken = mysqli_query($con, $QueryUserToken);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
                   //Set the SMTP server to send through
    $mail->CharSet = "utf-8";// set charset to utf8
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted                 //Enable SMTP authentication                        //SMTP password
    $mail->Port       = 587;  
    $mail->Host       = 'smtp.gmail.com';   
    $mail->SMTPDebug = 0;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->Username   = 'servieeuuplates@gmail.com';                     //SMTP username
    $mail->Password   = 'nzsgvaubdxtsawfe';       
    $mail->setFrom('servieeuuplates@gmail.com', 'ServicePlates');   //Add a recipient
    $mail->addAddress($emailUser);               //Name is optional
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification — ServicePlates';
    $mail->Body    = '
    <div>
    <h1>Welcome to ServiPlates</h1>
    <h3>To continue with the registration process</h3>
    <h3> Enter the following code to register your account:</h3>
    <h1>'.$ThisToken.'</h1>
    <h4>© 2023 All Rights Reserved. SERVIPLATES LLC USA.</h4>
    </div>
    ';
    $mail->send();
    echo 'Send Correct.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
}
if(isset($_GET['verifyToken']) && isset($_GET['emailUser'])){
    $verify = $_GET['verifyToken'];
    $emailUser = $_GET['emailUser'];
    $QueryVerify = ("SELECT `token_user` FROM `users` WHERE token_user = '$verify' && email_user = '$emailUser'");
    $ResultData     = mysqli_query($con, $QueryVerify);
    $resultFine  = mysqli_fetch_array($ResultData);
    if($resultFine == null || $resultFine == false) { 
        ?>
        <script>
        alert('The entered code is incorrect');
        window.location.href='./register2auth.php'
    </script>
        <?php
        return;
    
    }
    if($resultFine[0] == $verify){
        $QueryVerifyFinal = ("UPDATE `users` SET `verificacion_correo`='1' WHERE email_user = '$emailUser'");
        mysqli_query($con, $QueryVerifyFinal);
        $_SESSION['verificacion'] = 1;
        ?>
        <script>
        alert('Congratulations for registering. welcome to ServiPlates');
        window.location.href='./index.php'
    </script>
        <?php
        return;

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>

</script>
<body>
    <div class="container_form">
        <h1>Email Verification.</h1>
        <div class='input_info'><input type="text" name="" id="token_info" placeholder='Enter the validation code.'> <a id='confirm'>VERIFY</a></div>
           <center><h1 class='information'>Click here to receive a verification code</h1></center>
        <button id='enviar'>Request code</button>
    </div>
</body>

<script>
    let button = document.getElementById('enviar');
    let disponible = true;
    button.addEventListener('click', async ()=>{
        let generateToken = Math.random().toString(36).substring(2);
        let emailUser = '<?=$_SESSION['email_user']?>';
        if(disponible == false) return alert('You must wait a while to send another email.');
        alert('An email has been sent to your email address.');
        disponible = false;
        setTimeout(()=>{
            disponible = true;
        },15000)
        const response = await fetch(`./register2auth.php?generateToken=${generateToken}&emailUser=${emailUser}`,{
            method: 'POST',
            headers: {'Content-type': 'application/json'},
            body: JSON.stringify({
                generateToken,
                emailUser
            })
          }).catch(()=>{
            alert('We have an error, try again later')
          })
    })
    let button2 = document.getElementById('confirm')
    button2.addEventListener('click', async()=>{
        let input = document.getElementById('token_info');
        let emailUser = '<?=$_SESSION['email_user']?>';
        window.location.href= `./register2auth.php?verifyToken=${input.value}&emailUser=${emailUser}`;
    })

</script>



<style>
    body{
        background: url('./assets/img/banner.png');
        display: flex;
        justify-content: center;
        align-items: center;
       
    }
    .container_form{
        padding: 40px;
        margin-top: 100px;
        border-radius: 10px;
        background: rgba(10,10,10,0.8);
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #aaa;
        padding: 20px;
        overflow: scroll;
        overflow-x: hidden;

    }
    ::-webkit-scrollbar {
    display: none;
}
    input{
        width: 100%;
        height: 50px;
        background: none;
        border: 1px solid rgba(100,100,100,0.8);
        border-radius: 5px;
        color: #aaa;
        font-size: 25px;
        padding: 10px;
        font-weight: bold;
        margin-top: 80px;

    }
    button{
        padding: 20px;
        width: 250px;
        margin: 20px;
        background: #175d8b;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        color: #aaa;
        font-weight: bold;
        font-size: 20px;
        transition: 300ms;
     
    }
    button:hover{
        background: #148ddf);
        color: #fff;
        transform: translateY(10px);
    }
    .information{
        margin-top: 80px;
        font-size: 20px;
    }
    .input_info{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    

    }
    .input_info a{
        width: 150px;
        padding: 20px;
        width: 100px;
        margin-top: 10px;

        background: #175d8b;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        color: #aaa;
        font-weight: bold;
        font-size: 20px;
        transition: 300ms;
        text-decoration: none;
    }
    .input_info a:hover{
        background: #148ddf;
        color: #fff;
        transform: translateY(10px);
    }
</style>

</html>