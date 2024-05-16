<!DOCTYPE html>
<html>
<head>
<title>Patient Tracker</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!$_SESSION["username"]) {
header("Location: index.php");
}
$conn = new mysqli("localhost", "ali", "", "WT");
if($_GET["h"]&&$_GET["w"]) {
$conn->query("update users set height='".$_GET["h"]."', weight='".$_GET["w"]."' where username='".$_SESSION["username"]."'");
}
$result = $conn->query("select * from users where username='".$_SESSION["username"]."'");
$row = $result->fetch_assoc();
?>

<script>
function haw() {
let h = prompt("Enter the new Height value(in cms) : ");
if(h.search(/^\d+$/)!=-1) {
let w = prompt("Enter the new Weight value(in kgs) : ");
if(w.search(/^\d+$/)!=-1) {
window.location="home.php?h="+h+"&w="+w;
}
else {
alert("you should enter only a number");
}
}
else {
alert("you should enter only a number");
}
}

function bp() {
let x = document.getElementById("num1").value;
let y = document.getElementById("num2").value;
if(x){
if(y){
if(y>=40&&y<=60) {
if(x>=70&&x<=90) {
document.getElementById("item3").style="background-color:rgb(0,127,255)";
}else if(x>90&&x<=120) {
document.getElementById("item3").style="background-color:rgb(0,255,0)";
}else if(x>120&&x<=140) {
document.getElementById("item3").style="background-color:rgb(255,127,0)";
}else if(x>140&&x<=160) {
document.getElementById("item3").style="background-color:rgb(255,127,127)";
}else if(x>160&&x<=190) {
document.getElementById("item3").style="background-color:rgb(255,63,63)";
}else {
document.getElementById("item3").style="background-color:rgb(255,0,0)";
}
}else if(y>60&&y<=80) {
if(x>=70&&x<=120) {
document.getElementById("item3").style="background-color:rgb(0,255,0)";
}else if(x>120&&x<=140) {
document.getElementById("item3").style="background-color:rgb(255,127,0)";
}else if(x>140&&x<=160) {
document.getElementById("item3").style="background-color:rgb(255,127,127)";
}else if(x>160&&x<=190) {
document.getElementById("item3").style="background-color:rgb(255,63,63)";
}else {
document.getElementById("item3").style="background-color:rgb(255,0,0)";
}
}else if(y>80&&y<=90) {
if(x>=70&&x<=140) {
document.getElementById("item3").style="background-color:rgb(255,127,0)";
}else if(x>140&&x<=160) {
document.getElementById("item3").style="background-color:rgb(255,127,127)";
}else if(x>160&&x<=190) {
document.getElementById("item3").style="background-color:rgb(255,63,63)";
}else {
document.getElementById("item3").style="background-color:rgb(255,0,0)";
}
}else if(y>90&&y<=100) {
if(x>=70&&x<=160) {
document.getElementById("item3").style="background-color:rgb(255,127,127)";
}else if(x>160&&x<=190) {
document.getElementById("item3").style="background-color:rgb(255,63,63)";
}else {
document.getElementById("item3").style="background-color:rgb(255,0,0)";
}
}else if(y>100&&y<=120) {
if(x>=70&&x<=190) {
document.getElementById("item3").style="background-color:rgb(255,63,63)";
}else {
document.getElementById("item3").style="background-color:rgb(255,0,0)";
}
}else {
document.getElementById("item3").style="background-color:rgb(255,0,0)";
}
}else{
document.getElementById("item3").style="background-color:white";
}
}else{
document.getElementById("item3").style="background-color:white";
}
}

function prescript() {
window.location = "prescription.php";
}
</script>

<style>
body {
background-color : rgb(230,230,230);
}

#grid-container {
    display : grid;
    grid-template-columns : 20vw 80vw;
}

#container {
display : flex;
flex-direction : column;
justify-content : space-evenly;
}

.items {
display : flex;
flex-direction : column;
align-items : center;
justify-content : center;
background-color : white;
border-top : 2px solid rgb(0,255,255);
border-radius : 15px;
margin : 2%;
padding : 2%;
box-shadow : 3px 3px 9px black;
font-size : 2em;
text-align : center;
}

.items hr {
width : 80%;
}

.items:hover {box-shadow : 2px 2px 4px black;}

#doctor {
color : white;
background-color : rgb(0,0,127);
border : none;
border-radius : 5px;
padding : 15px 30px 15px 30px;
cursor : pointer;
}

#signout {
color : white;
background-color : red;
border : none;
border-radius : 5px;
padding : 15px 30px 15px 30px;
cursor : pointer;
}

#join {
display : none;
background-color : cyan;
border : none;
border-radius : 5px;
padding : 15px 30px 15px 30px;
cursor : pointer;
}

input[type="number"] {
font-size : 1em;
width : 80%;
margin : 0 10%;
border : none;
text-align : center;
}

#content {
    display : flex;
    justify-content : space-evenly;
    align-items : center;
}

#doctorInfo, #emergencyHelpLine {
    background-color : white;
    padding : 30px;
    border-radius : 25px;
    width : min(30vw, 30vh);
    height : min(30vw, 30vh);
    cursor : pointer;
}

#doctorInfo img, #emergencyHelpLine img {
    width : min(30vw, 30vh);
    height : min(30vw, 30vh);
}
</style>
</head>
<body>
<div id="grid-container">
<div id="container">
    <h1>Welcome 
    <?php
    if($row["gender"]==="Male") {
    echo "Mr. ".$row["name"];
    }
    else {
    echo "Ms. ".$row["name"];
    }
    ?></h1>
    <div class="items" id="item1">
    Age:<br>
    <span style="font-size:3em">
    <?php
    $age = date_diff(date_create($row["DOB"]), date_create('today'))->y;
    echo $age;
    ?>
    </span>
    </div>

    <div class="items" id="item2" title="Edit Height and Weight" onclick="haw()">
    BMI:<br>
    <span style="font-size:3em">
    <?php
    $bmi = round($row["weight"]/($row["height"]*0.01)**2);
    echo $bmi;
    if($bmi<19) {
    echo "<style>#item2 {background-color:rgb(0,127,255)}</style>";
    }
    else if($bmi>=19&&$bmi<25) {
    echo "<style>#item2 {background-color:rgb(0,255,0)}</style>";
    }
    else if($bmi>=25&&$bmi<30) {
    echo "<style>#item2 {background-color:rgb(255,127,0)}</style>";
    }
    else {
    echo "<style>#item2 {background-color:rgb(255,0,0)}</style>";
    }
    ?>
    </span>
    </div>

    <div class="items" id="item3" title="Enter Blood Pressure">
    Blood Pressure:<br>
    <input type="number" id="num1" value="0" onkeyup="bp()"><hr>
    <input type="number" id="num2" value="0" onkeyup="bp()">
    </div>

    <div class="items" id="item4" style="padding:50px 0" onclick="prescript()">
    Prescription
    </div>
    </div>
<div id="content">
    <div id="doctorInfo" title="click to check doctor's info" onclick="window.location='doctors.php';">
        <img src="doctor.png" alt="Doctor">
    </div>
    <div id="emergencyHelpLine" title="Emergency HelpLine" onclick="window.location='meeting.php';">
        <img src="helpline.png" alt="HelpLine">
    </div>
</div>
</div>
<div style="position:fixed; top:5px; right:5px;">
<button id="join" onclick="window.location='chat.php'">Join Chat!</button>
<button id="doctor" onclick="window.location='consult.php'">Consult Doctor</button>
<button id="signout" onclick="window.location='logout.php'">Sign Out</button>
</div>
</body>
<script>
    <?php
    $result = $conn->query("select username from appointments where username='".$_SESSION["username"]."' and date='".date("Y-m-d")."' and starttime<'00:".date("H:i")."' and endtime>'00:".date("H:i")."';");
    if($result->num_rows) {
        echo "document.getElementById('join').style.display = 'inline-block';";
    }
    $conn->close();
    ?>
</script>
</html>