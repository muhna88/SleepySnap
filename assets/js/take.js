var video = document.getElementById('video');
var result = document.getElementById('result');

navigator.mediaDevices.getUserMedia({
  video: {
    facingMode: 'user', // Atau 'environment' tergantung pada kamera
    aspectRatio: 0.75, // Ini mengatur aspek rasio potret
  },
  audio: false
})
  .then(function (stream) {
    video.srcObject = stream;
    video.play();
  })
  .catch(function (err) {
    console.log("An error occurred: " + err);
  });

function screenshot() {
  html2canvas(document.getElementById('container')).then(function (canvas) {
    result.src = canvas.toDataURL();
  });
}

const simpan = document.getElementById("simpan");
const simpan_show = document.getElementById("simpan-show");
// const unduhLink = document.getElementById('unduhLink');
simpan.addEventListener("click", function () {
  simpan_show.style.display = "block";

  // Tampilkan tautan unduh
  // unduhLink.href = canvas.toDataURL('image/png');
  // unduhLink.style.display = 'block';
})

// Get a reference to the element and the button
const notwib = document.getElementById("no-twibbon");
const twib1 = document.getElementById("twibbon1");
const twib2 = document.getElementById("twibbon2");
const twib3 = document.getElementById("twibbon3");
const imgtwib1 = document.getElementById("imgtwib1");
const imgtwib2 = document.getElementById("imgtwib2");
const imgtwib3 = document.getElementById("imgtwib3");


// Add a click event listener to the button
notwib.addEventListener("click", function () {
  imgtwib1.style.display = "none";
  imgtwib2.style.display = "none";
  imgtwib3.style.display = "none";
});
twib1.addEventListener("click", function () {
  imgtwib1.style.display = "block";
  imgtwib2.style.display = "none";
  imgtwib3.style.display = "none";
});
twib2.addEventListener("click", function () {
  imgtwib1.style.display = "none";
  imgtwib2.style.display = "block";
  imgtwib3.style.display = "none";
});
twib3.addEventListener("click", function () {
  imgtwib1.style.display = "none";
  imgtwib2.style.display = "nonw";
  imgtwib3.style.display = "block";
});

