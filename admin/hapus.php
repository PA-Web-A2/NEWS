<?php
require "../db/koneksi.php";
if (isset($_GET['judul'])) {
        $judul = $_GET['judul'];
        $query = "DELETE FROM artikel WHERE Judul = '$judul'";
        mysqli_query($conn,$query);
    }
    ?>
    <script>
    alert('Berhasil Hapus');
    document.location.href='../index.php';
    </script>