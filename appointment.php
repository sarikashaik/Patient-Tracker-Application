<!DOCTYPE html>
<html>
<head>
<title>Patient Tracker</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if(!$_SESSION["username"]) {
header("location: index.php");
}
if(!$_REQUEST["d"]||!$_REQUEST["s"]) {
header("location: consult.php");
}
$doctor = $_REQUEST["d"];
$specialized = $_REQUEST["s"];
$conn = new mysqli("localhost","ali","","WT");
$sql = "select * from doctors where doctor='".$doctor."' and specializedin='".$specialized."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 1) {
header("location: consult.php");
}
if($_REQUEST["date"]) {
$date = $_REQUEST["date"];
}
$sql = "select * from appointments where doctor='".$doctor."' and date='".$date."';";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<script>
function book() {
const x = document.getElementById("date");
if(x.value!="") {
n1 = new Date(x.value);
n2 = new Date();
if(n1>n2) {
if(confirm("Alert! You are going to book an appointment. Do you really want to continue?")) {
document.getElementsByTagName('form')[0].submit();
}
}
else {
alert("please select a valid date.");
}
}
else {
alert("please fill the date section.");
}
}

function update() {
const x = document.getElementById("date");
window.location = "<?php echo "appointment.php?d=".$doctor."&s=".$specialized."&date="; ?>"+x.value;
}
</script>

<style>
body {
    background-color : #DDD;
}

div {
display : inline-block;
text-align : center;
margin-top : 30vh;
margin-left : 50%;
transform : translateX(-50%);
padding : 25px;
border-radius : 25px;
background-color : white;
}
button {
color : white;
background-color : rgb(155,0,255);
border : none;
border-radius : 5px;
padding : 15px;
}
p {
    text-align : center;
}
</style>
</head>
<body>
<p>Name of the doctor : <?php echo $doctor;?></p>
<p>He/She is the <?php echo $specialized;?></p>
<div>
<form action="book.php" method="post">
<label for="date">Appointment date : </label><input type="date" id="date" name="date" onfocusout="update()" value="<?php echo $date; ?>"><br><br>
<input type="hidden" id="doctor" name="doctor" value="<?php echo $doctor;?>"><br>
<input type="hidden" id="specialized" name="specializedin" value="<?php echo $specialized;?>"><br>
</form>
<button onclick="book()">Book</button>
</div>

</body>
</html>