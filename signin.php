<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
<?php
session_start();
if($_SESSION["doctor"]) {
header("Location: chat.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$user = $_POST["username"];
$pass = $_POST["password"];
$conn = new mysqli("localhost","ali","","WT");
$sql = "select * from doctors where ID='".$user."'";
$result = $conn->query($sql);
if($result->num_rows == 1) {
$rol = $result->fetch_assoc();
if($pass == $rol["password"]) {
$_SESSION["doctor"] = $rol["doctor"];
header("location: chat.php");
}
else {
echo "window.alert('Check the username and password! Try again.');";
}
}
else {
echo "window.alert(\"The given username doesn't exist.\")";
}
$conn->close();
}
?>
</script>

<style>
body {
background-image : url('bg-auth.png');
background-repeat : no-repeat;
background-attachment : fixed;
background-size : cover;
display : flex;
justify-content : right;
align-items : center;
height : 100vh;
padding : 0 10%;
}

#box {
background-color : rgb(222,244,255);
border-top : 2px solid rgb(0,255,255);
padding : 50px;
border-radius : 25px;
}

input {
outline-color : rgb(0,255,255);
}

input[type="submit"], button {
background-color : rgb(123,216,249);
border : none;
border-radius : 10px;
padding : 10px;
cursor : pointer;
}
.equally-spaced-buttons {
    display : flex;
    justify-content : space-evenly;
}
</style>
</head>
<body>
<div id="box">
<form action="signin.php" method="POST">
<label for="username">Enter the doctor ID &nbsp &nbsp &nbsp &nbsp &nbsp: </label>
<input type="text" id="username" name="username" required><br><br>
<label for="password">Enter the password &nbsp &nbsp &nbsp &nbsp &nbsp: </label>
<input type="password" id="password" name="password" required><br><br>
<div class="equally-spaced-buttons">
<input type="submit" value="Log In">
<button style="background-color:rgb(77,148,178)" onclick="window.location='chat.php'">go back</button>
</div>
</form>
</div>
</body>
</html>