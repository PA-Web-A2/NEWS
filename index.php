<?php

  session_start();

  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // handling ketika $_SESSION['user'] belum di-set
    $user = '';
}


  require "db/koneksi.php";

  $result =  mysqli_query($conn,"SELECT * FROM berita WHERE Jenis = 'politik' ORDER BY ID_Berita DESC LIMIT 3;");
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="js/search.js"></script>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<body>

  <header>
      <div class="jumbotron bg-dark" style="height: 100%; background-image: url('assets/image/bg5.png'); background-size:cover;">
          <img src="assets/Image/logo.png" style="width: 120px;" alt="">
           <h1 class="text-center">
             ALL NEWS FOR YOU
           </h1> 
            <h5 class="text-center">ALL WE GIVE ARE THE BEST FOR YOUR EXPERIENCE</h5>
            <button class="btn btn-dark">
                <a href="#berita" style="text-decoration: none; color: rgb(255, 255, 255);">Read Now</a>
            </button>
      </div> 
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

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
                <form class="d-flex" method="post">
                  <input id="searchField" autocomplete="off" name="data" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width:350px;" onkeyup="search()">
                  <div>
                    <ul class="dropdown-menu" id="searchDropdown">
                    <li class="dropdown-item">
                      <a href="Main/berita.php?judul=${results[i]}">${results[i].judul}</a>
                    </li>
                    </ul>
                  </div>  
                  <!-- <button name="cari" class="btn btn-outline-light" type="submit">Search</button> -->
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
<div id="news" style="height: 100vh;" class="bg-dark">
    <div class="container-fluid">
      <img src="assets/Image/berita.jpg" alt="" style="width: 60%; float: left; padding: 5% 0 0 5%;">
      <div style="color: white; float: right; padding: 10% 5% 0 0; font-size: larger; font-weight: bold">
        Selamat datang di situs OUR NEWS!
        <br>
        <h6>Kami dengan senang hati menyambut Anda sebagai 
        <br>
        pembaca setia yang cerdas dan berpengetahuan. 
        <br>
        Di sini, Anda akan menemukan berita terkini dan
        <br>
        terpercaya yang mencakup berbagai topik 
        <br>
        dari seluruh dunia.</h6>
        <br>
        <?php
        if($user!=''){
          echo '<button class="btn btn-primary" disabled><a href="sign/login.php" style="padding-top: 3%; text-decoration: none; color: white; font-weight: 100;">Join Now</a></button>
          ';
        }else{
          echo '<button class="btn btn-primary"><a href="sign/login.php" style="padding-top: 3%; text-decoration: none; color: white; font-weight: 100;">Join Now</a></button>'; }
        ?>
      </div>
    </div>
</div>

<div id="berita" class="container-fluid bg-dark" style="color:white; width:100%; height:100%; text-align:center;">
  <div style="padding-top:10%; padding-bottom:10%;" class="bg-light">
    <h1 style="color:black;"> SEPUTAR <span class="slb"> SELEBRITY </span></h1>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div id="box" class="carousel-inner">
      <?php 
      $carou = mysqli_query($conn, "SELECT * FROM berita WHERE Jenis = 'artis' ORDER BY ID_Berita ASC LIMIT 3;");
      $rows = mysqli_fetch_all($carou, MYSQLI_ASSOC);
  
      for ($i = 0; $i < count($rows); $i++) {
        echo '
            <div class="carousel-item' . ($i === 0 ? ' active' : '') . '">
            <a href="Main/berita.php?judul='.$rows[$i]["Judul"].'">
            <img src="db/' . $rows[$i]['Gambar'] . '" class="d-block w-100" alt="..." >
            <div class="carousel-caption d-none d-md-block">
              <h5>' . $rows[$i]["Judul"] . '</h5>
            </div>
            </a>
          </div>
      ';
    }
  ?>
  
  
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
  <br>
<div style="text-align: left;" class="bg-light">
  <h1 class="jdl">DUNIA OLAHRAGA</h1>
</div>

<div class="row" style="padding:5%; justify-content:center;" >
  <div class="sport col-8">
    <?php 
    $card =  mysqli_query($conn,"SELECT * FROM berita WHERE Jenis = 'olahraga' ORDER BY ID_Berita DESC LIMIT 3;");
    while($row=mysqli_fetch_assoc($card)){
      echo'
      <div id="box" class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="db/'.$row["Gambar"].'" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><a href="Main/berita.php?judul='.$row["Judul"].'" style="text-decoration:None; color:black;">'.$row["Judul"].'</a></h5>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      ';
    }
    ?>
  </div>

  <div class="col aside">
      <!-- Konten aside disini -->
      <div class="list-group" >
        <a href="#" id="tb" class="list-group-item list-group-item-action active" aria-current="true" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))">
          All Topic
        </a>
        <a href="Bidang/politik.php" id="tb" class="list-group-item list-group-item-action">Politik</a>
        <a href="Bidang/artis.php" id="tb" class="list-group-item list-group-item-action">Selebritas</a>
        <a href="Bidang/olahraga.php" id="tb" class="list-group-item list-group-item-action">Olahraga</a>
        <a href="Bidang/bisnis.php" id="tb" class="list-group-item list-group-item-action">Bisnis</a>
        <a href="Bidang/international.php" id="tb" class="list-group-item list-group-item-action">International</a>
        <!-- <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a> -->
      </div>
      <br>
      <div class="list-group" >
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))">
          All NEWS
        </a>
        <?php
        $berita =  mysqli_query($conn,"SELECT * FROM berita ORDER BY ID_Berita ASC LIMIT 10;");
        while($row=mysqli_fetch_assoc($berita)){
          echo'
            <a href="Main/berita.php?judul='.$row["Judul"].'" class="list-group-item list-group-item-action">'.$row["Judul"].'</a>';
        }
        ?>
      </div>
  </div>
</div>

<br>

<div class="container-fluid bg-light" style="width:100%; padding:5%;">

<div>
  <h1 class="jdl" style="color:black;">POLITIK</h1>
</div>

<div class="row" style="justify-content:center; margin:0; color:black;">

<?php

while($row=mysqli_fetch_assoc($result)){

$i = 1;

if($i<3){

  echo '<div class="col-sm-3">

    <div id="box" class="card" style="min-height:15rem;">

      <img src="db/'.$row["Gambar"].'" class="card-img-top" alt="...">

      <div class="card-body">

        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>';

        // <h6 class="card-title text-left" id="harga">'.implode(' ', array_slice(str_word_count($row["Isi"], 1), 0, 30)).'</h6>

      echo'</div>

      <button id="tb" class="btn btn-dark">

      <a href="Main/berita.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Baca Selengkapnya</a>

      </button>

      '?> 

      <?php 
      echo'
      </div>
      </div>';

}}

?>

</div>

<div style="margin-top:50px; text-align:center;">

  <button id="tb" class="btn btn-primary" style="width:auto; background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) )"><a href="Main/menu.php" style="text-decoration:None; color:white;">View All</a></button>

</div>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 

<footer>
<div class="footers">
  <a href="#"><i class="fa fa-facebook" style="color:white;"></i></a>
  <a href="#"><i class="fa fa-instagram" style="color:white;"></i></a>
  <a href="#"><i class="fa fa-youtube" style="color:white;"></i></a>
  <a href="#"><i class="fa fa-twitter" style="color:white;"></i></a>
  <div class="cp" style="color:white;">ENJOY YOUR NEWS</div>
</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 

integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 

crossorigin="anonymous"></script>
<script>
  var nav =document.querySelector('nav');
  var btn =document.querySelector('button');
  window.addEventListener('scroll',function(){
    if(window.pageYOffset > 300){
      nav.classList.remove('bg-dark','navbar-dark','btn-outline-light');
      nav.classList.add('bg-light','navbar-light','btn-outline-dark');
      btn.classList.remove('btn-outline-light');
      btn.classList.add('btn-outline-dark');
    }else{
      nav.classList.remove('bg-light','navbar-light');
      nav.classList.add('bg-dark','navbar-dark');
      btn.classList.remove('btn-outline-dark');
      btn.classList.add('btn-outline-light');
    }
  })
</script>
</body>

</html>