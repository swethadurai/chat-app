<?php
    $conn=mysqli_connect("localhost","root","","chat app");
    if(!$conn){
        echo "connected". mysqli_connect_error();
    }
?>