<?php

  session_start();

  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // handling ketika $_SESSION['user'] belum di-set
    $user = '';
}


  require "db/koneksi.php";

  $result =  mysqli_query($conn,"SELECT * FROM berita WHERE Jenis = 'berita' ORDER BY ID_Berita DESC LIMIT 3;");

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>BERITA</title>

  <link rel="stylesheet" href="assets/style.css">

  <script src="https://kit.fontawesome.com/5c90e171df.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<body>

  <header>

      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent">

          <div class="container-fluid">

            <!-- <a class="navbar-brand" href="#">

              <img src="assets/Image/icon.png" style="width:180px;" alt="">

            </a> -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">

              <ul class="navbar-nav">

                <li class="nav-item">

                  <a class="nav-link active" aria-current="page" href="#">Beranda</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" href="Main/menu.php">Berita</a>

                </li>
                <li class="nav-item dropdown">

                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    Bidang

                  </a>

                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="bidang/politik.php">Politik</a></li>

                    <li><a class="dropdown-item" href="bidang/olahraga.php">Olahraga</a></li>

                    <li><a class="dropdown-item" href="bidang/artis.php">Artis</a></li>

                    <li><a class="dropdown-item" href="bidang/international.php">International</a></li>

                    <li><a class="dropdown-item" href="bidang/bisnis.php">Bisnis</a></li>

                  </ul>

                </li>
                <?php
                if($user == "writer"){
                  echo '<li class="nav-item">
                  <a class="nav-link" href="profile/berita.php">Profile</a>
                  </li>';
                }
                ?>

                <?php
                if($user == "admin"){
                  echo '<li class="nav-item">
                  <a class="nav-link" href="admin/menu.php">Manage</a>
                  </li>';
                }
                ?>
                <li class="nav-item">
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width:300px;">
                  <button class="btn btn-outline-light" type="submit">Search</button>
                </form>

                </li>

              </ul>

              <div class="collapse navbar-collapse" style="justify-content:right;">
              <ul class="navbar-nav">

                <?php

                if($user!=''){

                  echo '<li class="nav-item">

                  <a class="nav-link active" aria-current="page" href="logout.php" style="color:red;">Logout</a>

                  </li>';  

                }else{
                  echo '<li class="nav-item">

                          <a class="nav-link active" aria-current="page" href="db/tambah.php">Login</a>

                        </li>';
		};

                ?>

              </ul>

              </div>

            </div>

          </div>

        </nav>

</header>
<div>
  <img src="assets/Image/bg5.png" class="img-fluid" alt="..." style="width:100%;">
  <!-- <video autoplay loop muted style="width:100%">
    <source src="assets/Image/bg.mp4">
  </video> -->
</div>
<div class="container-fluid" style="width:100%; height:100%;">
  <div class="row" style="margin-top:5%; margin-bottom:10%;" >
    <div class="col-7">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/Image/img2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/Image/img3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/Image/img4.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>
    <div class="col" style="margin-top:4%;">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="assets/Image/img3.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="assets/Image/img5.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="container-fluid" style="width:100%;">
<!-- <h1 style="text-align:center; padding: 3%; font-weight:bold;">BERITA</h1> -->

<div class="row" style="justify-content:center; margin:0;">

<?php

while($row=mysqli_fetch_assoc($result)){

$i = 1;

if($i<3){

  echo '<div class="col-sm-3">

    <div class="card" style="min-height:15rem;">

      <img src="db/'.$row["Gambar"].'" class="card-img-top" alt="...">

      <div class="card-body">

        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>';

        // <h6 class="card-title text-left" id="harga">'.implode(' ', array_slice(str_word_count($row["Isi"], 1), 0, 30)).'</h6>

      echo'</div>

      <button class="btn btn-dark">

      <a href="Main/berita.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Baca Selengkapnya</a>

      </button>

      '?> 

      <?php 

          if($user == 'admin' ){

            echo'

            <div style="text-align:center;  margin:2%;">
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

                    <a href="db/hapus.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Hapus</a>
        
                    </button>
                  </div>
                </div>
              </div>
            </div>';
          }
      echo'

      </div>

      </div>';

}}

?>

</div>

<div style="margin-top:50px; text-align:center;">

  <button class="btn btn-primary" style="width:auto;"><a href="Main/menu.php" style="text-decoration:None; color:white;">View All</a></button>

</div>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 

<footer>

  <div class="footers container-fluid" style=" padding-bottom:10%;">

    <div class="row justify-content-center">

      <div class="col-sm-5">

        <img src="assets/Image/icon.png" style="width:250px;" alt="">

        <br>

        <a style="font-size:medium;">Puji syukur kita panjatkan Kehadirat Tuhan Yang Maha Esa sehubungan dengan telah berfungsinya Website Kejaksaan Tinggi Balikpapan yang merupakan salah satu langkah upaya penerapan teknologi informasi menuju reformasi birokrasi kejaksaan untuk Indonesia lebih maju.</a>

      </div>

      <div class="col-md-3">

        <h6 style="font-weight: bold; font-size:larger;">Kontak Kami</h6>

        <ul class="social-icons">

          <li><a class="instagram" href="https://www.instagram.com/kejari.balikpapan/"><i class="fa fa-instagram"></i></a></li>

          <li><a class="twitter" href="https://twitter.com/KN_Balikpapan"><i class="fa fa-twitter"></i></a></li>

          <li><a class="facebook" href=" https://www.facebook.com/kejari.balikpapan/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>

          <li><a class="youtube" href="https://www.youtube.com/@kejari.balikpapan848"><i class="fa fa-youtube"></i></a></li>   

        </ul>

      </div>

      <div class="col-md-3">

        <h6 style="font-weight: bold; font-size:larger;">Alamat</h6>

        <ul class="footer-links alamat">

          <li><a href="https://goo.gl/maps/HHyHtfyVDYx34YFi8" style="text-decoration:none; color:black;"> Jln.Jendral Sudirman No.70 Kota Balikpapan, Kalimantan Timur</a></li>

        </ul>

      </div>

    </div>

  </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 

integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 

crossorigin="anonymous"></script>
<script>
  var nav =document.querySelector('nav');
  window.addEventListener('scroll',function(){
    if(window.pageYOffset > 100){
      nav.classList.remove('bg-transparent','navbar-dark');
      nav.classList.add('bg-light','navbar-light');
    }else{
      nav.classList.remove('bg-light','navbar-light');
      nav.classList.add('bg-transparent','navbar-dark');
    }
  })
</script>

</body>

</html>