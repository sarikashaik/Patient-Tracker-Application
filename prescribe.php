<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescribe</title>
    <?php
        session_start();
        date_default_timezone_set("Asia/Kolkata");
        if(!$_SESSION["doctor"]){
            header("Location: index.php");
        }
        if($_SERVER["REQUEST_METHOD"]=="GET") {
            $conn = new mysqli("localhost","ali","","WT");
            $query="select username from appointments where doctor='".$_SESSION['doctor']."' and date='".date("Y-m-d")."' and starttime<'00:".date("H:i")."' and endtime>'00:".date("H:i")."';";
            $username=mysqli_query($conn,$query)->fetch_assoc()["username"];
            if($username)
                $conn->query("insert into prescription(doctor,username,date_of_issue,prescription) values('".$_SESSION["doctor"]."','$username', '".date("Y-m-d")."','".$_GET["prescribe"]."');");
            echo "<script>window.location='chat.php';</script>";
            $conn->close();
        }
    ?>
</head>
<body>
    
</body>
</html>