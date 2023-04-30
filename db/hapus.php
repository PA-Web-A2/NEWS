<?php
require "koneksi.php";
if (isset($_GET['judul'])) {
        $judul = $_GET['judul'];
        $query = "DELETE FROM berita WHERE Judul = '$judul'";
        mysqli_query($conn,$query);
    }
    ?>
    <script>
    alert('Berhasil Hapus');
    document.location.href='../index.php';
    </script>