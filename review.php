<!DOCTYPE html>
<html>
<head>
<title>Health Care</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if(!$_SESSION["username"]||!$_SESSION["review"]) {
header("location: home.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST") {
$x = $_POST["rate"];
if($x) {
$_SESSION["review"] = "";
echo "<p style='color:green; font-size:2em;'>Thanks for rating</p>";
} else {
echo "<p style='color:red; font-weight:600; font-size:2em;'>please give proper rating</p>";
}
}
?>
<script>
function check(x) {
let a = document.getElementById("1");
let b = document.getElementById("2");
let c = document.getElementById("3");
let d = document.getElementById("4");
let e = document.getElementById("5");
let f = document.getElementById("6");
let g = document.getElementById("7");
let h = document.getElementById("8");
let i = document.getElementById("9");
let j = document.getElementById("10");
switch(x) {
case 1:
a.checked = true;
f.src = "1.png";
g.src = "0.webp";
h.src = "0.webp";
i.src = "0.webp";
j.src = "0.webp";
break;
case 2:
b.checked = true;
f.src = "1.png";
g.src = "1.png";
h.src = "0.webp";
i.src = "0.webp";
j.src = "0.webp";
break;
case 3:
c.checked = true;
f.src = "1.png";
g.src = "1.png";
h.src = "1.png";
i.src = "0.webp";
j.src = "0.webp";
break;
case 4:
d.checked = true;
f.src = "1.png";
g.src = "1.png";
h.src = "1.png";
i.src = "1.png";
j.src = "0.webp";
break;
case 5:
e.checked = true;
f.src = "1.png";
g.src = "1.png";
h.src = "1.png";
i.src = "1.png";
j.src = "1.png";
break;
default:
console.log("wrong approach");
}
}
</script>
<style>
body {
text-align : center;
}
input[type=radio] {
display : none;
}
#flex {
height : 80vh;
display : flex;
flex-direction : row;
justify-content : center;
align-items : center;
}
input[type=submit] {
border : none;
border-radius : 15px;
background-color : green;
color : white;
padding : 15px;
font-size : 1.5em;
}
</style>
</head>
<body>
<?php
if(!($_SERVER["REQUEST_METHOD"]=="POST")) {
echo "<h1 style='text-align:center; color:lightblue'>Please share you experience with us</h1>";
}
?>
<form action="?" method="POST">
<div id="flex"><div>
<input type="radio" id="1" name="rate" value="1">
<label for="1" onmouseover="check(1)"><img id="6" src="0.webp" style="width:15vw; height:auto;"></label></div><div>
<input type="radio" id="2" name="rate" value="2">
<label for="2" onmouseover="check(2)"><img id="7" src="0.webp" style="width:15vw; height:auto;"></label></div><div>
<input type="radio" id="3" name="rate" value="3">
<label for="3" onmouseover="check(3)"><img id="8" src="0.webp" style="width:15vw; height:auto;"></label></div><div>
<input type="radio" id="4" name="rate" value="4">
<label for="4" onmouseover="check(4)"><img id="9" src="0.webp" style="width:15vw; height:auto;"></label></div><div>
<input type="radio" id="5" name="rate" value="5">
<label for="5" onmouseover="check(5)"><img id="10" src="0.webp" style="width:15vw; height:auto;"></label></div></div>
<br>
<input type="submit" value="send">
</form>
</body>
</html>