<?php

    session_start();

    require "../db/koneksi.php";
    if (isset($_SESSION['user']) && ($_SESSION['user'] === "writer" OR $_SESSION['user'] === "admin")) {
    if (isset($_GET['judul'])) {
      $judul = $_GET['judul'];    
      $result = mysqli_query($conn,"SELECT*FROM artikel WHERE Judul ='$judul'");
    }
    $username = $_SESSION['username'];
    while($row=mysqli_fetch_assoc($result)){
    $newjudul = $row["Judul"];

    $jenis = $row["Jenis"];

    $gambar = $row["Gambar"];

    $tanggal = $row["Waktu"];

    $isi = $row["Isi"];
    
    $query = "INSERT INTO berita VALUES('', '$username' ,'$jenis','$gambar', '$newjudul', '$tanggal', '$isi')";
    if(mysqli_query($conn, $query)){

    }else{
        echo "<script>
        alert('Berita dengan Judul ini sudah ada');
        window.location.href = '../index.php';
        </script>";
    }
  }} else {
    // Jika session "user" bukan "admin", maka arahkan pengguna ke halaman lain atau tampilkan pesan error
    echo "<script>
    window.location.href = '../index.php';
    </script>";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>BERITA</title>
</head>
<body>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    Swal.fire({
        title: "Sukses mengupload",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = "../index.php";
    });
    </script>
    <script src="sweetalert2.all.min.js"></script>
</body>
</html>

