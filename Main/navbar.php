<?php
      session_start();
      if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
      } else {
          // handling ketika $_SESSION['user'] belum di-set
          $user = '';
      }
      require "../db/koneksi.php";
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
  <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" >
          <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">
              <img src="../assets/Image/icon.png" style="width:180px;" alt="">
            </a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../index.php">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Main/menu.php">Berita</a>
                </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bidang
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="politik.php">Politik</a></li>
                    <li><a class="dropdown-item" href="olahraga.php">Olahraga</a></li>
                    <li><a class="dropdown-item" href="artis.php">Artis</a></li>
                    <li><a class="dropdown-item" href="international.php">International</a></li>
                    <li><a class="dropdown-item" href="bisnis.php">Bisnis</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="collapse navbar-collapse" style="justify-content:right;">
            <ul class="navbar-nav">
              <?php
              if($user=''){
              ?>
              <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="upload.php">Create</a>
                </li>
              <?php }?>
            </ul>
            </div>
          </div>
        </nav>
  </header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
</body>
</html>