<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SleepySnap</title>

  <!-- Font Family -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

  <!-- css -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <script src="assets/vendor/canvas/html2canvas.js"></script>
  <!-- <style>
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
  </style> -->
</head>

<body class="d-flex justify-content-center">
  <main>
    <div class="pic-twibbon" id="container">
      <img src="assets/img/twibbon/frame1.png" alt="twibbon1" id="imgtwib1" style="position: fixed">
      <img src="assets/img/twibbon/frame2.png" alt="twibbon2" id="imgtwib2" style="position: fixed; display:none;">
      <img src="assets/img/twibbon/frame3.png" alt="twibbon3" id="imgtwib3" style="position: fixed; display:none;">
      <video id="video" class="video" style="height: 2880px;" autoplay></video>
      <!-- <video id="video" style="width: 2160px; height: 2880px;" autoplay></video> -->
      <div class="position-absolute top-50 start-50 text-white title" id="waktuMundur" style="font-size: 450px;"></div>
    </div>

    <div class="header-twibbon text-center">
      <p class="title">Bingkai untuk kamu</p>
      <div class="filter text-center">
        <button class="btn btn-light btn-lg rounded-circle fw-semibold mx-4" id="no-twibbon" type="button">
          <img src="assets/img/twibbon/btn-frame-no.png" width="300" alt="">
        </button>
        <button class="btn btn-light btn-lg rounded-circle fw-semibold mx-4" id="twibbon1" type="button">
          <img src="assets/img/twibbon/btn-frame-1.png" class="rounded-circle" width="300" alt="">
        </button>
        <button class="btn btn-light btn-lg rounded-circle fw-semibold mx-4" id="twibbon2" type="button">
          <img src="assets/img/twibbon/btn-frame-2.png" width="300" alt="">
        </button>
        <button class="btn btn-light btn-lg rounded-circle fw-semibold mx-4" id="twibbon3" type="button">
          <img src="assets/img/twibbon/btn-frame-3.png" width="300" alt="">
        </button>
      </div>
      <div class="submit">
        <button class="btn-submit btn btn-light btn-lg rounded-pill fw-semibold showResult" id="btn-login" type="button" onclick='hitungMundur()'>Ambil Foto</button>
        <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
        <!-- <button class="btn-submit btn btn-light btn-lg rounded-pill fw-semibold" id="btn-login" type="button" onclick='screenshot();'>Ambil Foto</button> -->
        <button class="btn-submit btn btn-light btn-lg rounded-pill fw-semibold lihatFoto" id="btn-login" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat Foto</button>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

          <!-- <form action="mailer.php" method="post">
            </form> -->
          <img src="" alt="foto" id="result" width="980" class="text-center mb-5">


          <div class="button-foto d-grid">
            <a class="btn btn-light btn-lg rounded-pill fw-semibold mt-5 ulang" href="twibbon.php">AMBIL ULANG FOTO</a>
            <button class="btn btn-light btn-lg rounded-pill fw-semibold mt-3 mb-4 simpan" id="simpan" onclick="getBase64()">SIMPAN HASIL FOTO</button>

            <!-- <a class="btn btn-light btn-lg rounded-pill fw-semibold mt-5 ulang" id="unduhLink" download="foto.png">UNDUH FOTO</a>

            <br> -->

            <div class="" id="simpan-show" style="display:none;">
              <div class="modal-title text-center mb-4">
                <p>
                  Apakah anda ingin mengirim hasil foto anda?
                </p>
              </div>

              <form action="mailer.php" method="post" id="uploadForm" enctype="multipart/form-data">
                <input type="hidden" name="base64Image" id="resultBase64">
                <div class="input-group input-group-lg email">
                  <input type="text" class="form-control rounded-pill" placeholder="Email" name="email">
                </div>
                <br>
                <div class="input-group input-group-lg email">
                  <input type="text" class="form-control rounded-pill" placeholder="Isikan Nama Anda" name="nama_pengirim">
                </div>

                <div class="d-grid">
                  <button class="btn btn-light btn-lg rounded-pill fw-semibold mb-4 mt-4 simpan" name="submit" type="submit" id="kirimButton">KIRIM HASIL FOTO</button>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="fixed-bottom-div">
        <div class="simple-keyboard"></div>
      </div>
    </div>
  </main>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/take.js"></script>
  <script src="assets/js/face-api.min.js"></script>
  <script type="text/javascript">
    function hitungMundur() {
      // alert("sjdka");
      var timeleft = 3;
      var downloadTimer = setInterval(function() {
        $("#waktuMundur").html(timeleft);
        if (timeleft <= 0) {
          $("#waktuMundur").html(" ");
          screenshot();
          $(".lihatFoto").click();
          clearInterval(downloadTimer);
        }

        console.log(timeleft)
        timeleft -= 1;
      }, 1000);
    }

    function getBase64() {
      let base64Image = $("#result").attr("src");
      $("#resultBase64").val(base64Image);
      console.log(base64Image)
    }
  </script>
  <!-- <script src="assets/js/script.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>