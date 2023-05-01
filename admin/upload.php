<?php

    session_start();

    require "../db/koneksi.php";
    if (isset($_GET['judul'])) {
      $judul = $_GET['judul'];    
      $result = mysqli_query($conn,"SELECT*FROM artikel WHERE Judul ='$judul'");
    }
    $username = $_SESSION['username'];
    while($row=mysqli_fetch_assoc($result)){
    if($username == '' ){

        header('location:../login.php');

    }else{
        $newjudul = $row["Judul"];

        $jenis = $row["Jenis"];

        $gambar = $row["Gambar"];

        $tanggal = $row[""];

        $isi = $_POST["isi"];
        
        $query = "INSERT INTO berita VALUES('', '$username' ,'$jenis','$gambar', '$judul', '$tanggal', '$isi')";
        mysqli_query($conn, $query);
        echo "<script>

            alert('Berhasil');

            document.location.href='../index.php';    

        </script>";
  }}
?>

