<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        date_default_timezone_set("Asia/Kolkata");
        if(!$_SESSION["username"]&&!$_SESSION["doctor"]){
            header("Location: index.php");
        }
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $conn = new mysqli("localhost","ali","","WT");
            if($_SESSION["username"]) {
                $query="select doctor from appointments where username='".$_SESSION['username']."' and date='".date("Y-m-d")."' and starttime<'00:".date("H:i")."' and endtime>'00:".date("H:i")."';";
                $doctor=mysqli_query($conn,$query)->fetch_assoc()["doctor"];
                if($doctor)
                    $conn->query("insert into messages values('".$_SESSION["username"]."','$doctor','".$_POST["message"]."');");
            }
            if($_SESSION["doctor"]) {
                $query="select username from appointments where doctor='".$_SESSION['doctor']."' and date='".date("Y-m-d")."' and starttime<'00:".date("H:i")."' and endtime>'00:".date("H:i")."';";
                $username=mysqli_query($conn,$query)->fetch_assoc()["username"];
                if($username)
                    $conn->query("insert into messages values('".$_SESSION["doctor"]."','$username','".$_POST["message"]."');");
            }
            echo "<script>window.location='chat.php';</script>";
            $conn->close();
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Doctor</title>
    <style>
        body {
            background-color : cyan;
        }
        #message_container{
            display: flex;
            flex-direction: column;
            height : 90vh;
        }
        .send{
            text-align: right;
            padding: 10px;
        }
        span{
            background-color : #F6A6CD;
            padding: 5px;
            border-radius: 5px;
        }
        .receive{
            padding: 10px;
        }
        #chatBox {
            position : fixed;
            left : 50%;
            transform : translateX(-50%);
            bottom : 10px;
            display : flex;
            align-items : center;
        }
        textarea {
            resize : none;
            padding : 10px;
            border : none;
            outline : none;
        }
        input[type="submit"], input[type="button"] {
            padding : 10px;
            border : none;
            background-color : #F6A6CD;
            cursor : pointer;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color : #E696BD;
        }
    </style>
</head>
<body>
    <div id="message_container">
    </div>
    <form action="?" method="post" id="chatBox">
        <?php
        if($_SESSION["doctor"]) {
            echo '<input type="button" value="logout" style="border-radius : 10px 0 0 10px" onclick="window.location=\'logout.php\'">
            <textarea name="message" id="message" cols="30" rows="1" placeholder="Chat here.."></textarea>
            <input type="submit" value="Send">
            <input type="button" value="prescribe" style="border-radius : 0 10px 10px 0" onclick="window.location=\'prescribe.php?prescribe=\'+document.getElementById(\'message\').value;">';
        } else {
            echo '<textarea name="message" id="message" cols="30" rows="1" placeholder="Chat here.." style="border-radius : 10px 0 0 10px"></textarea>
            <input type="submit" value="Send" style="border-radius : 0 10px 10px 0">';
        }
        ?>
    </form>
    <script>
        var source = new EventSource("sse.php");
        source.onmessage = function(event) {
        document.getElementById("message_container").innerHTML = event.data;
        };
    </script>
</body>
</html>