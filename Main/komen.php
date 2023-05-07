<?php
session_start();
require '../db/koneksi.php';

$berita = $_SESSION['berita'];
$result = mysqli_query($conn, "SELECT * FROM berita WHERE ID_Berita ='$berita'");
$row = mysqli_fetch_assoc($result);
$judul = $row["Judul"];

$komentar = $_POST["komentar"];
$id = $_SESSION['username'];
$user = $_SESSION['user'];
$query = "INSERT INTO komentar VALUES('', '$id', '$berita', '$user', '$komentar')";

if (mysqli_query($conn, $query)) {
    header("Location: berita.php?judul=" . urlencode($judul));
    exit;
} else {
    echo "<script>alert('Gagal');</script>";
}
?>

