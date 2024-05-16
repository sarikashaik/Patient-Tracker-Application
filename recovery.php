<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovery</title>
    <script>
    <?php
        session_start();
        if($_SESSION["username"]) {
        header("Location: home.php");
        }
        $conn = new mysqli("localhost", "root", "", "WT");
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            if($_POST["password"]==$_POST["re-password"]) {
                $result = $conn->query("select primary_recovery, secondary_recovery from users where username='".$_POST["username"]."'");
                if($result->num_rows==0) {
                    echo "window.alery('there is no such username');";
                } else {
                    $row = $result->fetch_assoc();
                    if($row["primary_recovery"]==$_POST["recovery-1"]&&$row["secondary_recovery"]==$_POST["recovery-2"]) {
                        $conn->query("update users set password='".$_POST["password"]."' where username='".$_POST["username"]."';");
                        header("Location: login.php");
                    } else {
                        echo "window.alert('wrong answers');";
                    }
                }
            } else {
                echo "window.alert('passwords should match!');";
            }
        }
        $conn->close();
    ?>
    </script>
    <style>
        body {
            background-image : url('bg-auth.png');
            background-repeat : no-repeat;
            background-attachment : fixed;
            background-size : cover;
            display : flex;
            justify-content : center;
            align-items : center;
            height : 100vh;
            padding : 0 10%;
        }
        input {
            outline-color : cyan;
        }
        #recovery-1, #recovery-2 {
            width : 90%;
            padding : 5%;
        }
        input[type="submit"] {
            background-color : rgb(123,216,249);
            border : none;
            border-radius : 10px;
            padding : 10px;
            cursor : pointer;
        }
    </style>
</head>
<body>
    <form action="?" method="post">
        <label for="username">Enter your username : </label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="recovery-1">where did you completed your schooling?</label><br>
        <input type="text" name="recovery-1" id="recovery-1" required><br><br>
        <label for="recovery-2">who is you elder most cousin?</label><br>
        <input type="text" name="recovery-2" id="recovery-2" required><br><br><br>
        <label for="password">Enter your new password : </label>
        <input type="password" name="password" id="password" required><br><br>
        <label for="re-password">Enter your password again : </label>
        <input type="password" name="re-password" id="re-password" required><br><br>
        <div style="text-align:center;"><input type="submit" value="Recover"></div>
    </form>
</body>
</html>