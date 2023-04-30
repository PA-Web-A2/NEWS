<?php
    $conn = mysqli_connect("localhost","root","","kejaksaan");
    if(!$conn){
        die("Gagal Terhubung".mysqli_connect_error());
    }
?>