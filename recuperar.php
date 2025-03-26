<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require "conexion.php";



$email = isset($_POST['correo']) ? trim($_POST['correo']) : '';

$verificar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE correo = '$email'");

if (mysqli_num_rows($verificar_usuario) > 0){
   
$mail = new PHPMailer(true);
try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'freakiercandy@gmail.com'; // Tu correo Gmail
    $mail->Password = 'xppx niam vipj erxz'; // Usa la "Contraseña de Aplicación" generada en Google
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('freakiercandy@gmail.com', 'Soporte');
    // echo "Correo a enviar: '$email'";
    // exit();
    $mail->addAddress($email);
    $mail->Subject = 'Recuperacion de contrasena';
    
    // Generar token y enlace
    $token = bin2hex(random_bytes(50));
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $link = "http://localhost/El_chucho/restablecer.php?token=" . $token;
    
    // Guardar token en la BD
    $sql = "UPDATE usuarios SET token_recuperacion='$token', expira_token='$expira' WHERE correo='$email'";
    mysqli_query($conectar, $sql);
    
    // Contenido del correo
    $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña, tienes una hora para cambiar tu contraseña: $link";

    $mail->send();
    echo "<script>alert('Correo enviado. Revisa tu bandeja de entrada.'); location.href='index.php';</script>";
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
} else {
    echo '
     <script>
     alert("Este no esta registrado en el sistema");
     history.go(-1)
     </script>';
     exit();
    }
?>