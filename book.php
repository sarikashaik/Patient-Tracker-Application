<!DOCTYPE html>
<html>
<head>
<title>Health Care</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if(!$_SESSION["username"]||$_SERVER["REQUEST_METHOD"]!="POST") {
header("location: index.php");
}
function done() {
$_SESSION["doctor"] = $_POST["doctor"];
$_SESSION["specializedin"] = $_POST["specializedin"];
header("location: consult.php?f=3");
}
$conn = new mysqli("localhost", "ali", "","WT");
$result = $conn->query("select * from appointments where doctor='".$_POST["doctor"]."' and date='".$_POST["date"]."'");
$row = $conn->query("select * from users where username='".$_SESSION["username"]."'");
$user = $row->fetch_assoc();
switch ($result->num_rows) {
case 0:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:09:01','00:09:15')");
done();
break;
case 1:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:09:16','00:09:30')");
done();
break;
case 2:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:09:31','00:09:45')");
done();
break;
case 3:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:09:46','00:10:00')");
done();
break;
case 4:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:10:01','00:10:15')");
done();
break;
case 5:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:10:16','00:10:30')");
done();
break;
case 6:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:10:31','00:10:45')");
done();
break;
case 7:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:10:46','00:11:00')");
done();
break;
case 8:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:11:01','00:11:15')");
done();
break;
case 9:
$conn->query("insert into appointments values('".$_SESSION["username"]."','".$_POST["doctor"]."','".$_POST["date"]."','00:11:16','00:11:30')");
done();
break;
default:
header("location: consult.php?f=1");
}
$conn -> close();
?>
</head>
<body>
Successful
</body>
</html>