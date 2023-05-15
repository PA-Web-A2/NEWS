<?php
      session_start();
      if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
      } else {
          // handling ketika $_SESSION['user'] belum di-set
          $user = '';
      }
      require "../db/koneksi.php";
      $result = mysqli_query($conn,"SELECT*FROM berita WHERE Jenis='bisnis'");
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
  require 'navbar.php';?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
  crossorigin="anonymous"></script>
<div style="width:100%; background-color:lightgrey;">
<br>
<!-- <img src="assets/Image/img1.jpg" style="width: 100%; margin-top:5%;" alt=""> -->
<h1 class="slb" style="text-align:center; padding: 5% 0 5% 0; font-weight:bold; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"
>Berita Bisnis</h1>
<div class="row" style="justify-content:center; margin:0;">
<?php
while($row=mysqli_fetch_assoc($result)){
    echo '<div class="col-sm-3" style="margin-right:1.5vw;">
    <div id="box" class="card" style="min-height:35rem;">
        <img src="../db/'.$row["Gambar"].'" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>
        <h6 class="card-title text-left" id="harga">'.implode(' ', array_slice(str_word_count($row["Isi"], 1), 0, 30)).'</h6>
        </div>
        <button id="tb" class="btn btn-dark">
        <a href="show.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Baca Selengkapnya</a>
        </button>
        '?> 
        <?php 
            if($user == 'admin' ){
              echo'
              <div style="text-align:center;  margin:2%;">
              <button class="btn btn-primary">
              <a href="modify/edit.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Edit</a>
              </button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Hapus
            </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Apakah anda yakin ingin menghapus
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger">

                    <a href="modify/hapus.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Hapus</a>
        
                    </button>
                  </div>
                </div>
              </div>
            </div>';
            }
        echo'
        </div>
        </div>';
}
?>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<footer>
<div class="footers" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189));">
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