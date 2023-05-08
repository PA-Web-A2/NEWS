<?php
// Ambil keyword dari permintaan GET
require '../db/koneksi.php';
$keyword = $_GET["keyword"];

// Lakukan pencarian berdasarkan keyword
// Lakukan query ke database atau sumber data lainnya sesuai kebutuhan
$query = "SELECT * FROM berita WHERE Judul LIKE '%".$keyword."%'";
$result = mysqli_query($conn, $query);

// Membangun array hasil pencarian
$results = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $results[] = $row['Judul'];
  }
} else {
  $results[] = "Tidak ada hasil";
}

// Kembalikan hasil dalam format JSON
echo json_encode($results);
?>
