<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

if (isset($_POST['submit'])) {


  $mail = new PHPMailer(true);

  $nama_pengirim = $_POST['nama_pengirim'];
  $email = $_POST['email'];


  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'pecintanasi07@gmail.com';                     //SMTP username
  $mail->Password   = 'gbfwxgjjmsjspgwhi';                               //SMTP password
  // gbfwxgjjmsjspgwhi

  // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  // $mail->Port       = 587;
  // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

  $mail->Port = 465;
  $mail->SMTPSecure = 'ssl';

  //Recipients
  $mail->setFrom('pecintanasi07@gmail.com', 'Twibbon');
  $mail->addAddress($email, $nama_pengirim);     //Add a recipient
  // $mail->addAddress('ellen@example.com');               //Name is optional
  $mail->addReplyTo('pecintanasi07@gmail.com', 'Twibbon');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'TWIBBON';
  $mail->Body    = 'HALO!, sobat parlemen. ini adalah hasil twibbon anda ' . $nama_pengirim . ' ';
  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if ($mail->send()) {
    echo 'Message has been sent';
  } else {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
} else {
  echo "Tekan dulu tombol nya!";
}
