<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
date_default_timezone_set("Asia/Kolkata");
session_start();
$conn= new mysqli("localhost",'ali','','WT');
if($_SESSION['username']){
    $query="select doctor from appointments where username='".$_SESSION['username']."' and date='".date("Y-m-d")."' and starttime<'00:".date("H:i")."' and endtime>'00:".date("H:i")."';";
    $doctor=mysqli_query($conn,$query)->fetch_assoc()["doctor"];
    $message = "<div class='send'><span>".$doctor."</span></div>";
    $query="select * from messages where sender ='".$_SESSION['username']."' and receiver='".$doctor."' or sender='".$doctor."' and receiver='".$_SESSION['username']."'";
    $result=mysqli_query($conn,$query);
    while($row=$result->fetch_assoc()){
        if($row['sender']==$_SESSION['username']){
            $message .= "<div class='send'><span>".$row["message"]."</span></div>";
        } else {
            $message .= "<div class='receive'><span>".$row["message"]."</span></div>";
        }
    }
    echo "data: $message\n\n";
}
if($_SESSION["doctor"]) {
    $query="select username from appointments where doctor='".$_SESSION['doctor']."' and date='".date("Y-m-d")."' and starttime<'00:".date("H:i")."' and endtime>'00:".date("H:i")."';";
    $user=mysqli_query($conn,$query)->fetch_assoc()["username"];
    $query="select * from messages where sender ='".$_SESSION['doctor']."' and receiver='".$user."' or sender='".$user."' and receiver='".$_SESSION['doctor']."'";
    $result=mysqli_query($conn,$query);
    while($row=$result->fetch_assoc()){
        if($row['sender']==$_SESSION['doctor']){
            $message .= "<div class='send'><span>".$row["message"]."</span></div>";
        } else {
            $message .= "<div class='receive'><span>".$row["message"]."</span></div>";
        }
    }
    echo "data: $message\n\n";
}
$conn->close();
?>