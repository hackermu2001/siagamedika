<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//sesuaikan name dengan di form nya ya 
// $email = $_POST['email'];
$senderMail = $_POST['senderMail'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                   //Enable SMTP authentication
 $mail->Username   = 'briancavarelthomas@gmail.com';  //SMTP username (your email)
 $mail->Password   = 'grertlsokldwzuci';     //SMTP password (your email password)
 $mail->SMTPSecure = 'tls';                  //Enable implicit TLS encryption
 $mail->Port       = 587;                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('briancavarelthomas@gmail.com', $name); // Set sender email to your email
 $mail->addAddress('briancavarelthomas@gmail.com');                              // Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $combinedSubject = $subject . " - " . $senderMail;
 $mail->Subject = $combinedSubject;
 $mail->Body    = $message;  
 $mail->AltBody = '';
 $mail->send();
?>
