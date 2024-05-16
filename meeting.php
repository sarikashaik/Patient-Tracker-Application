<html>
<head>
<title>Health Care</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if(!$_SESSION["username"]) {
header("location: home.php");
}
$_SESSION["review"] = true;
?>
<style>
body {
background-color : black;
background-image : url('heartbeat-heart.gif');
background-repeat : no-repeat;
background-attachment : fixed;
background-position : center center;
}
video {
display : none;
width : 25vw;
height : 25vh;
}
#video-container {
height : 25vh;
text-align : right;
}
#videooff {
color : white;
width : 25vw;
height : 25vh;
align-items : center;
}
button {
height : 30px;
width : 30px;
border : none;
border-radius : 15px;
}

#end {
height : auto;
width : auto;
background-color : red;
padding : 7px;
}

div {
margin : 15px;
}

#controls {
position : fixed;
bottom : 5vh;
width : 100vw;
display : flex;
text-align : center;
color : white;
flex-direction : row;
justify-content : center;
}
</style>
<script>
function updatevideo() {
if(navigator.mediaDevices) {
navigator.mediaDevices.getUserMedia({
video: true,
audio: true
}).then(function(vidStream) {
var video = document.getElementById('videoon');
if ("srcObject" in video) {
video.srcObject = vidStream;
} else {
video.src = window.URL.createObjectURL(vidStream);
}
video.onloadedmetadata = function() {
video.play();
}
});
}
}

let a = false;
function ass() {
if(a) {
w.style.backgroundColor = "white";
w.innerHTML = "o";
a = false;
} else {
w.style.backgroundColor = "red";
w.innerHTML = "x";
a = true;
}
}

let v = false;
function vss() {
if(v) {
x.pause();
x.style.display = "none";
y.style.display = "inline-block";
y.innerHTML = "your video is turned off";
z.style.backgroundColor = "white";
z.innerHTML = "o";
v = false;
updatevideo();
} else {
y.innerHTML = "";
x.style.display = "inline-block";
y.style.display = "none";
z.style.backgroundColor = "red";
z.innerHTML = "x";
v = true;
updatevideo();
x.play();
}
}

</script>
</head>
<body>

<div id="video-container">
<video id="videoon"></video>
<span id="videooff">your video is turned off</span>
</div>
<div id="controls">
<div>
<button id="vc" onclick="vss()">o</button><label for="vc">video</label>
</div>
<div>
<button id="end" onclick="window.location='review.php'">END</button>
</div>
<div>
<button id="ac" onclick="ass()">o</button><label for="ac">audio</label>
</div>
</div>

<script>
let x = document.getElementById("videoon");
let y = document.getElementById("videooff");
let z = document.getElementById("vc");
let w = document.getElementById("ac");
</script>
</body>
</html>