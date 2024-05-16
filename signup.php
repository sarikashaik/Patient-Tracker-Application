<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="icon" href="fevicon.webp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
<?php
session_start();
if($_SESSION["username"]) {
header("Location: home.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$user = $_POST["username"];
$pass = $_POST["password"];
if($pass == $_POST["rewrite"]) {
$conn = new mysqli("localhost","ali","","WT");
$sql = "select * from users where username ='".$user."'";
$result = $conn->query($sql);
if($result->num_rows == 0) {
$sql = "INSERT INTO users VALUES ('".$user."', '".$pass."', '".$_POST["name"]."', '".$_POST["DOB"]."', '".$_POST["gender"]."', '".$_POST["height"]."', '".$_POST["weight"]."', '".$_POST["email"]."', '".$_POST["phone"]."', '".$_POST["primaryRecovery"]."', '".$_POST["secondaryRecovery"]."')";
$conn->query($sql);
$_SESSION["username"] = $user;
header("location: home.php");
}
else {
echo "window.alert('The given user name is already taken.');";
}
$conn->close();
}
else {
echo "window.alert(\"Passwords didn't matched\");";
}
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

input[type="radio"] {
accent-color : rgb(0,255,255);
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
<form action="signup.php" method="POST">
<label for="username">Enter the username &nbsp &nbsp &nbsp &nbsp &nbsp: </label>
<input type="text" id="username" name="username" maxlength="30" pattern="[A-Za-z0-9_]+" placeholder="only alphanumeric & '_'" required><br><br>
<label for="password">Enter the password &nbsp &nbsp &nbsp &nbsp &nbsp: </label>
<input type="password" id="password" name="password" maxlength="30" required><br><br>
<label for="rewrite">Enter the password again : </label>
<input type="password" id="rewrite" name="rewrite" maxlength="30" required><br><br><hr><br>
<label for="name">Enter your name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: </label>
<input type="text" id="name" name="name" maxlength="50" required><br><br>
<label for="DOB">Enter your Date of Birth : </label>
<input type="date" id="DOB" name="DOB" required><br><br><span>Gender : </span>
<input type="radio" id="male" name="gender" value="Male" checked><label for="male">Male</label>
<input type="radio" id="female" name="gender" value="Female"><label for="female">Female</label><br><br>
<label for="height">Enter your Height (in cms) : </label>
<input type="text" id="height" name="height" pattern="[0-9]+" required><br><br>
<label for="weight">Enter your Weight (in kgs) &nbsp: </label>
<input type="text" id="weight" name="weight" pattern="[0-9]+" required><br><br>
<label for="email">Enter you Email Address &nbsp &nbsp : </label>
<input type="email" id="email" name="email" maxlength="60" required><br><br>
<label for="phone">Enter your Phone Number : </label>
<input type="text" id="phone" name="phone" pattern="[0-9]{10}" placeholder="xxxxxxxxxx" required><span> *(x -> 0-9)</span><br><br>
<label for="primaryRecovery">where did you completed your schooling?</label><br>
<input type="text" name="primaryRecovery" id="primaryRecover" style="width:90%; padding:5%" required><br><br>
<label for="secondaryRecovery">who is your elder most cousin?</label><br>
<input type="text" name="secondaryRecovery" id="secondaryRecovery" style="width:90%; padding:5%" required><br><br>
<div class="equally-spaced-buttons">
<input type="submit" value="Sign Up">
<button style="background-color:rgb(77,148,178);" onclick="window.location='home.php'">go back</button>
</div>
</form>
</div>
</body>
</html>