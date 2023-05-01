<?php
    $conn = mysqli_connect("localhost","root","","mynews");
    if(!$conn){
        die("Gagal Terhubung".mysqli_connect_error());
    }
?>