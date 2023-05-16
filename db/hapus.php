<?php
require "koneksi.php";
session_start();
if (isset($_SESSION['user']) && ($_SESSION['user'] === "writer" OR $_SESSION['user'] === "admin")) {
    if (isset($_GET['judul'])) {
        $judul = $_GET['judul'];
        $query = "DELETE FROM berita WHERE Judul = '$judul'";
        mysqli_query($conn,$query);
}}else {
    // Jika session "user" bukan "admin", maka arahkan pengguna ke halaman lain atau tampilkan pesan error
    echo "<script>
    window.location.href = '../index.php';
    </script>";
}
?>
<script>
alert('Berhasil Hapus');
document.location.href='../index.php';
</script>