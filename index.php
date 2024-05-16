<!DOCTYPE html>
<html>
<head>
<title>Health Care</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if($_SESSION["username"]||$_SESSION["doctor"]) {
header("location: home.php");
}
?>

<script>
function login() {window.location = "login.php";}
function signup() {window.location = "signup.php";}
function doctor_signin() {window.location = "signin.php";}
</script>

<style>
body {
    display : flex;
    background-image : url('bg-auth.png');
    background-repeat : no-repeat;
    background-attachment : fixed;
    background-size : cover;
    justify-content : center;
    align-items : center;
    height : 100vh;
}

#box {
    background-color : rgb(222,244,255);
    border-top : 2px solid cyan;
    padding : 50px;
    border-radius : 25px;
}

button {
    background-color : rgb(11,222,222);
    border : none;
    border-radius : 4px;
    box-shadow : 2px 2px 2px black;
}

button:hover {
    box-shadow : 1px 1px 1px black;
}
</style>
</head>
<body>
<div id="box">
<p style="font-weight:strong">Want to take a good healthcare or Want to have any medical suggestion, join us.</p>
<p style="font-weight:bold">Already have an account? Login here --> <button onclick="login()">LOGIN</button></p>
<p style="font-weight:bold">Don't have an account? Signup here --> <button onclick="signup()">SIGN UP</button></p>
<p style="font-weight:bold">Doctor?? --> <button onclick="doctor_signin()">SIGN IN</button></p>
<div>
</body>
</html>