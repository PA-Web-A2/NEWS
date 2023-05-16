<?php
require "../db/koneksi.php";
session_start();
// Cek apakah pengguna memiliki session "user" dan nilainya adalah "admin"
if (isset($_SESSION['user']) && ($_SESSION['user'] === "writer" OR $_SESSION['user'] === "admin")) {
    if (isset($_GET['judul'])) {
        $judul = $_GET['judul'];
        $query = "DELETE FROM artikel WHERE Judul = '$judul'";
        mysqli_query($conn, $query);
    }
} else {
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
        title: "Sukses menghapus",
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