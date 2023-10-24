var video = document.getElementById('video');

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