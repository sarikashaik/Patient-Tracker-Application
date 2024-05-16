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
}if($_GET["f"]==3) {
echo "<p style='color:green; font-weight:900; font-size:1.5em'>You have successfully booked an appointment. Please go to meeting page to see the appointment timings and meeting link.</p>";
}
if($_GET["f"]==1)
{
echo "<p style='color:red; font-weight:900; font-size:1.5em'>All slots are full on selected date. Please select another doctor or date to book an appointment</p>";
}
$conn = new mysqli("localhost","ali","","WT");
$result = $conn->query("select * from doctors order by specializedin");
echo "<script>
let doc = new Array();
let spe = new Array();
let app = new Array();
let rat = new Array();
let riv = new Array();
";
while($row=$result->fetch_assoc()) {
echo "doc.push('".$row['doctor']."');
spe.push('".$row['specializedin']."');
app.push('".$row['appointments']."');
rat.push('".$row['rating']."');
riv.push('".$row['review']."');
";
}
echo "</script>";
?>

<style>
body {
text-align : center;
background-color : #DDD;
}

select {
min-width : 200px;
width : 25vw;
text-transform : capitalize;
padding : 10px;
border-radius : 10px;
border : none;
margin : 10px;
}

.class_a {
min-width : 33vw;
}
.class_b {
min-width : 16.5vw;
}

table, th, td {
border : none;
}
th {
background-color : white;
}
td {
text-transform : capitalize;
}
tr:hover {
background-color : rgb(235,235,235);
}
</style>
</head>
<body>
<h1>Make an Appointment</h1>
<select id="selection" onchange="sort()">
<option value="all">select any specific field here</option>
<?php
$result = $conn->query("select distinct specializedin from doctors order by specializedin");
while($row=$result->fetch_assoc()) {
echo "<option value='".$row["specializedin"]."'>".$row["specializedin"]."</option>";
}
?>
</select>

<table>
<thead>
<tr>
<th class="class_a">Doctor</th>
<th class="class_a">Specialized from</th>
<th class="class_b">Rating</th>
<th class="class_b">Total Reviews</th>
</tr>
</thead>
<tbody id="display">
</tbody>
</table>

<script>
let x = document.getElementById("selection");
let y = document.getElementById("display");
sort();
function sort() {
switch (x.value) {
case "all":
y.innerHTML = "";
for (c in doc) {
y.innerHTML += "<tr onclick=\"go("+c+")\"><td class=\"class_a\">"+doc[c]+"</td><td class=\"class_a\">"+spe[c]+"</td><td class=\"class_b\">"+rat[c]+"</td><td class=\"class_b\">"+riv[c]+"</td></tr>";
}
break;
<?php
$result = $conn->query("select distinct specializedin from doctors order by specializedin");
while($row=$result->fetch_assoc()) {
echo "case \"".$row["specializedin"]."\":
y.innerHTML = '';
for (c in spe) {
if(spe[c]=='".$row["specializedin"]."') {
y.innerHTML += '<tr onclick=\'go('+c+')\'><td class=\'class_a\'>'+doc[c]+'</td><td class=\'class_a\'>'+spe[c]+'</td><td class=\'class_b\'>'+rat[c]+'</td><td class=\'class_b\'>'+riv[c]+'</td></tr>';
}
}
break;
";
}
?>
default:
y.innerHTML = "";
}
}

function go(c) {
window.location = "appointment.php?d="+doc[c]+"&s="+spe[c];
}
</script>

<?php
$conn->close();
?>
</body>
</html>