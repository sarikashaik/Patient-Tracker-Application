<!DOCTYPE html>
<html>
<head>
<title>Patient Tracker</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
div, h1 {
text-align : center;
}
body {
    background-color : rgb(230,230,230);
}
p {
    background-color : white;
    padding : 20px;
    border-radius : 10px;
}
</style>
</head>
<body>
<?php
session_start();
if(!$_SESSION["username"]) {
header("location: index.php");
}
else {
$conn = new mysqli("localhost","ali","","WT");
$result = $conn->query("select * from prescription where username='".$_SESSION["username"]."' order by `date_of_issue` DESC");
if($result->num_rows==0) {
echo "You have no Prescription";
} else {
echo "<h1>Prescriptions</h1>";
while($row = $result->fetch_assoc()) {
    echo "<p><span style='font-weight:900'>Prescribed by </span>".$row["doctor"]."<br><span style='font-weight:bold'>Date of Issue : </span>".$row["date_of_issue"]."<br><br><span style='display:inline-block; padding:25px 50px; text-align:justify;'>".$row["prescription"]."</span></p>";
}
}
$conn->close();
}
?>
<div><button onclick='window.print();'>print page</button></div>
</body>
</html>