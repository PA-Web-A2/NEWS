<?php

session_start();
require "../db/koneksi.php";
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
} else {
  // handling ketika $_SESSION['user'] belum di-set
  $_SESSION['user'] = '';
}

if (isset($_POST['sorting'])) {
  $sort = $_POST['sorting'];

  if (isset($_POST['save'])) {
    if ($sort == "Judul") {
      $results = mysqli_query($conn, "SELECT * FROM berita ORDER BY Judul ASC");
    } else if ($sort == "terlama") {
      $results = mysqli_query($conn, "SELECT * FROM berita ORDER BY ID_Berita ASC");
    }
    else {
      $results = mysqli_query($conn, "SELECT * FROM berita ORDER BY ID_Berita DESC");
    }
  }
} else {
  $results = mysqli_query($conn, "SELECT * FROM berita ORDER BY ID_Berita DESC");
}


?>
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

  <?php 
  include 'navbar.php';?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
  crossorigin="anonymous"></script>

<div style="width:100%;">

<br>

<!-- <img src="assets/Image/img1.jpg" style="width: 100%; margin-top:5%;" alt=""> -->

<h1 style="text-align:center; padding: 8% 0 3% 0; font-weight:bold; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
>SEMUA BERITA</h1>
<div class="container-fluid">
  <button id="tb" type="button" style="margin:0 0 0 10%; width:auto; background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Sorting
  </button>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sorting berdasarkan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <select name="sorting" class="form-select" id="inputGroupSelect01">
            <option value="None">None</option>
            <option value="Judul">Judul</option>
            <option value="terbaru">Terbaru</option>
            <option value="terlama">Terlama</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="tb" type="submit" class="btn btn-primary" name="save" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))"
            >Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row" style="justify-content:center; margin:0;">
  
<?php

while($row=mysqli_fetch_assoc($results)){

    echo '<div class="col-sm-3" style="margin:1.5%;">

    <div id="box" class="card" style="min-height:35rem;">

        <img src="../db/'.$row["Gambar"].'" class="card-img-top" alt="...">

        <div class="card-body">

        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>

        <h6 class="card-title text-left" id="harga">'.implode(' ', array_slice(str_word_count($row["Isi"], 1), 3, 30)).'</h6>

        </div>
        <button id="tb" class="btn btn-dark" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))">
        <a href="berita.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Baca Selengkapnya</a>
        </button>
        '?> 
        <?php 
            echo'</div>
            </div>';
            }
            ?>

</div>

</div>

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