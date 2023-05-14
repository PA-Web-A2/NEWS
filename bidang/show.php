<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>BERITA</title>

  <link rel="stylesheet" href="../assets/style.css">

  <script src="https://kit.fontawesome.com/5c90e171df.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<body>

  <header>

      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );>

          <div class="container-fluid">

            <a class="navbar-brand" href="#">

              <!-- <img src="../assets/Image/icon.png" style="width:180px;" alt=""> -->

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">

              <ul class="navbar-nav">

                <li class="nav-item">

                  <a style="color: white;" class="nav-link" aria-current="page" href="../index.php">Beranda</a>

                </li>

                <li class="nav-item">

                  <a style="color: white;" class="nav-link" href="../Main/menu.php">Berita</a>

                </li>

                <li class="nav-item dropdown">

                  <a style="color: white;" class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    Bidang

                  </a>

                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="pembinaan.php">Pembinaan</a></li>

                    <li><a class="dropdown-item" href="intelijen.php">Intelijen</a></li>

                    <li><a class="dropdown-item" href="umum.php">Tindak Pidana Umum</a></li>

                    <li><a class="dropdown-item" href="khusus.php">Tindak Pidanan Khusus</a></li>

                    <li><a class="dropdown-item" href="perdata.php">Perdata dan Tata Usaha</a></li>

                  </ul>

                </li>

                <li class="nav-item dropdown">

                  <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    Profile

                  </a>

                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="../profile/struktur.php">Strutur Organisasi</a></li>

                    <li><a class="dropdown-item" href="../profile/visimisi.php">Visi Misi</a></li>

                    <li><a class="dropdown-item" href="../profile/perintah.php">Perintah Harian</a></li>

                    <li><a class="dropdown-item" href="../profile/doktrin.php">Doktrin</a></li>

                    <li><a class="dropdown-item" href="../profile/tugas.php">Tugas dan Wewenang</a></li>

                  </ul>

                </li>

              </ul>

            </div>

            <div class="collapse navbar-collapse" style="justify-content:right;">

            <ul class="navbar-nav">

              <li class="nav-item">

                    <a class="nav-link active" aria-current="page" href="upload.php">Create</a>

                </li>

            </ul>

            </div>

          </div>

        </nav>

  </header>

  <?php

    session_start();

    require "../db/koneksi.php";

    if (isset($_GET['judul'])) {

    $judul = $_GET['judul'];

    $result = mysqli_query($conn,"SELECT*FROM berita WHERE Judul ='$judul'");

    }

  ?>

<div style="width:100%;">

<br>

<h1 style="text-align:center; padding: 3%; font-weight:bold; margin-top: 5%; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
>BERITA</h1>

<main>

<div id="content" style="margin-left:1%; width:70%;">

<?php 

while($row=mysqli_fetch_assoc($result)){
    $berita=$row['ID_Berita'];
    $komen = mysqli_query($conn,"SELECT*FROM komentar WHERE ID_Berita = '$berita'");
    $_SESSION['berita']=$berita;

    echo "<img src='../db/".$row['Gambar']."' style='width:100%' class='featured-image' alt=''>

    <h3>".$judul."</h3>        

    <p>".nl2br($row["Isi"])."</p>";

}?>

<article class="card">

<?php 

while($row=mysqli_fetch_assoc($result)){

    echo "<img src='../db/".$row['Gambar']."' style='width:100%' class='featured-image' alt=''>

    <h3>".$judul."</h3>        

    <p>".nl2br($row["Isi"])."</p>";

}?>

</article>

</div>

<aside style="width:29%;">

<div style="padding: 5%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">

    <div class="input-group mb-3">

        <button id="tb" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189));">Cari</button>

        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

    </div>

</div>

<br>

<div class="card" >

<<<<<<< HEAD
  <div class="list-group" >
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          All Item
        </a>
        <a href="Bidang/politik.php" class="list-group-item list-group-item-action">Politik</a>
        <a href="Bidang/artis.php" class="list-group-item list-group-item-action">Selebritas</a>
        <a href="Bidang/olahraga.php" class="list-group-item list-group-item-action">Olahraga</a>
        <a href="Bidang/bisnis.php" class="list-group-item list-group-item-action">Bisnis</a>
        <a href="Bidang/international.php" class="list-group-item list-group-item-action">International</a>
        <!-- <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a> -->
  </div>

=======
  <div id="tb" class="card-header">

    Berita Terbaru

  </div>

  <ul class="list-group list-group-flush">

    <li id="tb" class="list-group-item">Berita Terlama</li>

    <li id="tb" class="list-group-item">Yang Teratas</li>

    <li id="tb" class="list-group-item">Selebritas</li>

  </ul>

>>>>>>> refs/remotes/origin/master
</div>

</aside>

</main>

</div>
<?php 
if($_SESSION["user"] == 'user'){
?>
  <div class="container-fluid">
    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"
    >Komentar</h3>
    <div>
      <form action="komen.php" method="POST">
        <textarea name="komentar" id="" rows="10" style="width:100%;"></textarea>
        <button id="tb" class="btn btn-success" type="submit" name="tambah" style="margin:10px; background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );"
        >Upload</button>
      </form>
    </div>
    <?php
    // echo $user;
    // if (mysqli_num_rows($result) >= 0) {
    while($row=mysqli_fetch_assoc($komen)){
    echo '<div class="card">
          <div class="card-header">
            '.$row["Nama"].'
          </div>
          <div class="card-body">
            <p class="card-text">'.$row["Isi"].'</p>
          </div>
          </div>';
        }
      // }
  ?>
  </div>
<?php 
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<footer>
<div class="footers">
  <a href="#"><i class="fa fa-facebook"></i></a>
  <a href="#"><i class="fa fa-instagram"></i></a>
  <a href="#"><i class="fa fa-youtube"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <div class="cp">ENJOY YOUR NEWS</div>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 

integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 

crossorigin="anonymous"></script>

</body>

</html>