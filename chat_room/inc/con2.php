<?php
$az = "localhost";
$qs = "root";
$ed = "";
$er = "chat_room";

$con = mysqli_connect("$az","$qs","$ed","$er");

if ($con) {
  echo "<script>console.log('Connected To Database')</script>";
}else {
    echo "<script>console.log('Connection Failed')</script>";
    exit();
}



 ?>
