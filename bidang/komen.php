<?php
session_start();
require '../db/koneksi.php';

$berita = $_SESSION['berita'];
$result = mysqli_query($conn, "SELECT * FROM berita WHERE ID_Berita ='$berita'");
$row = mysqli_fetch_assoc($result);
$judul = $row["Judul"];

$komentar = $_POST["komentar"];
$id = $_SESSION['username'];
$results = mysqli_query($conn, "SELECT * FROM admin WHERE ID_Admin ='$id'");
while($row=mysqli_fetch_assoc($results)){
    $user = $row["Username"];
}
$query = "INSERT INTO komentar VALUES('', '$id', '$berita', '$user', '$komentar')";

if (mysqli_query($conn, $query)) {
    header("Location: show.php?judul=" . urlencode($judul));
    exit;
} else {
    echo "<script>alert('Gagal');</script>";
}
?>

