<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include('PHPMailer/src/Exception.php');
include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');
include("./base64.php");


if (isset($_POST['submit'])) {
  // base64_to_jpeg("","");

  $NamaPengirim = $_POST['nama_pengirim'];
  $email = $_POST['email'];
  // $gmbr = $_POST['gambar'];
  // $base64 = $_POST['base64Image'];
  $email_pengirim = 'nmuhamad388@gmail.com'; // isikan dengan email pengirim... twibbon@dpr.go.id
  $nama_pengirim = 'twibbon SleepySnap'; // isikann dengan nama pengirim ... twibbon dpr ri
  $email_penerima = $_POST['email']; //ambil email penerima dari inputan form
  $subjek = 'no_reply@dpr.go.id'; // ambil subjek dari inputan form 
  $pesan = 'HALO, sobat parlemen! ini adalah hasil twibbon anda';


  $mail = new PHPMailer;
  $mail->isSMTP();

  $mail->Host = 'smtp.gmail.com';
  // ip host dpr = 172.17.3.22 
  $mail->Username = $email_pengirim; //email pengirim 
  $mail->Password = 'ogmzewwoiewpgfnz '; // isikan password dengan email pengirim 
  $mail->Port = 465;
  // port = 25252
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->SMTPDebug = SMTP::DEBUG_OFF; // aktifkan untuk melakukan debugging 

  $mail->setFrom($email_pengirim, $nama_pengirim);
  $mail->addAddress($email_penerima);
  $mail->isHTML(true); // aktifkan jika isi email berupa html
  $mail->Subject = $subjek;
  $mail->Body = $pesan;

  // Lampiran gambar
  // if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
  //   $tmpName = $_FILES['gambar']['tmp_name'];
  //   $fileName = $_FILES['gambar']['name'];
  //   $mail->addAttachment($tmpName, $fileName);
  // }

  $contact_image_data = $_POST['base64Image'];
  $data = substr($contact_image_data, strpos($contact_image_data, ","));
  $filename = "twibbon.png";
  $encoding = "base64";
  $type = "image/png";
  $mail->AddStringAttachment(base64_decode($data), $filename, $encoding, $type);

  $send = $mail->send();

  if ($send) {
    echo "<h1>Email berhasil dikirim</h1><br/><a href='twibbon.php'>kembali ke form</a>";
  } else {
    "<h1>Email berhasil dikirim</h1><br/><a href='twibbon.php'>kembali ke form</a>";
  }
  echo "<script>alert('Data berhasil ditambahkan dan email notifikasi terkirim')</script>";
  echo "<script type='text/javascript'>document.location='index.php'</script>";
  // db dapil/kota minta ke pa angga prog 46
}
