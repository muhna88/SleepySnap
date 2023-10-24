<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SleepySnap</title>

  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- css -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: blueviolet;
      /* width: 2160px;
      height: 2880px; */
    }

    canvas {
      position: absolute;
      /* lebar  2160px*/
      width: 2160px;
      /* tinggi 3840px*/
      height: 2200px;
    }
  </style>
</head>

<body class="d-flex justify-content-center">
  <main>
    <div class="header">
      <p class="judul">Hi,</p>
      <p class="title">Apakah hari ini kamu dalam mode <b>power up</b> atau <b>sleep mode</b>?</p>
    </div>
    <!-- <video id="video" class="video" style="height: 2880px;">Video stream tidak ditemukan.</video> -->
    <video id="video" style="width: 2160px; height: 2880px;" autoplay></video>
    <!-- d-grid play mb-5 px-5 tombols text-center -->

    <div class="tombols text-center position-sticky">
      <a class="tombol btn-primary rounded-pill" href="twibbon.php">AMBIL FOTO</a>
    </div>

    <div class="direct text-center">
      <a href="http://172.18.25.11/"><i class="bi bi-caret-left-fill"></i>Kembali ke QuickPlay</a>
    </div>
  </main>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/video.js"></script> -->
  <script src="assets/js/face-api.min.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>