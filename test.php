<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam and Microphone Test</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

h1 {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    margin: 0;
}

.test-section {
    margin: 20px;
    padding: 20px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
}

video, audio {
    margin: 10px 0;
    max-width: 100%;
    width: 300px;
}

select {
    margin: 10px 0;
    padding: 5px;
}

    </style>
</head>
<body>
    <h1>Webcam and Microphone Test</h1>
    <div class="test-section">
        <h2>Webcam Test</h2>
        <select id="videoDevices"></select>
        <button onclick="startWebcam()">Start Webcam</button>
        <video id="webcam" autoplay></video>
    </div>
    <div class="test-section">
        <h2>Microphone Test</h2>
        <select id="audioDevices"></select>
        <button onclick="startMicrophone()">Start Microphone Test</button>
        <audio id="microphoneTest" controls></audio>
    </div>
    <div class="test-section">
        <h2>Speaker Test</h2>
        <button onclick="playSound()">Play Test Sound</button>
    </div>
    <script>
        // Hàm để liệt kê và hiển thị các thiết bị video và audio
async function listDevices() {
    const devices = await navigator.mediaDevices.enumerateDevices();
    const videoDevices = devices.filter(device => device.kind === 'videoinput');
    const audioDevices = devices.filter(device => device.kind === 'audioinput');

    const videoSelect = document.getElementById('videoDevices');
    const audioSelect = document.getElementById('audioDevices');

    videoDevices.forEach(device => {
        const option = document.createElement('option');
        option.value = device.deviceId;
        option.text = device.label || `Camera ${videoSelect.length + 1}`;
        videoSelect.appendChild(option);
    });

    audioDevices.forEach(device => {
        const option = document.createElement('option');
        option.value = device.deviceId;
        option.text = device.label || `Microphone ${audioSelect.length + 1}`;
        audioSelect.appendChild(option);
    });
}

// Hàm để bắt đầu webcam
async function startWebcam() {
    const videoSelect = document.getElementById('videoDevices');
    const videoSource = videoSelect.value;
    const constraints = {
        video: { deviceId: videoSource ? { exact: videoSource } : undefined }
    };

    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        const video = document.getElementById('webcam');
        video.srcObject = stream;
    } catch (error) {
        console.error('Error accessing webcam: ', error);
    }
}

// Hàm để bắt đầu micro
async function startMicrophone() {
    const audioSelect = document.getElementById('audioDevices');
    const audioSource = audioSelect.value;
    const constraints = {
        audio: { deviceId: audioSource ? { exact: audioSource } : undefined }
    };

    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        const audio = document.getElementById('microphoneTest');
        audio.srcObject = stream;
        audio.play();
    } catch (error) {
        console.error('Error accessing microphone: ', error);
    }
}

// Hàm để phát âm thanh kiểm tra loa
function playSound() {
    const audio = new Audio('test-sound.mp3');
    audio.play();
}

// Gọi hàm listDevices khi trang được tải
window.addEventListener('load', listDevices);

    </script>
</body>
</html>
