<?php

  // session_start();

    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
  } else {
      // handling ketika $_SESSION['user'] belum di-set
      $_SESSION['user'] = '';
  }
  ;?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <!-- <meta http-equiv="refresh" content="5"> -->

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
    include '../bidang/navbar.php';
    

    require "../db/koneksi.php";

    if (isset($_GET['judul'])) {
      
      $judul = $_GET['judul'];
      $result = mysqli_query($conn,"SELECT*FROM artikel WHERE Judul ='$judul'");
    }

  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
<div style="width:100%;">
<div style="width:100%;">

<br>

<h1 style="text-align:center; padding: 3%; font-weight:bold; margin-top: 5%; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
>BERITA</h1>

<main>

<div id="content" article class="card">

<?php 

while($row=mysqli_fetch_assoc($result)){
    $berita=$row['ID_Berita'];
    $komen = mysqli_query($conn,"SELECT*FROM komentar WHERE ID_Berita = '$berita'");
    $_SESSION['berita']=$berita;

    echo "<img src='../db/".$row['Gambar']."' style='width:100%' class='featured-image' alt=''>

    <h3>".$judul."</h3>        

    <p>".nl2br($row["Isi"])."</p>";

}?>

</article>

</div>

<aside>

<div style="padding: 5%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">

    <div class="input-group mb-3">

        <button class="btn btn-outline-secondary" type="button" id="button-addon1">Cari</button>

        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

    </div>

</div>

<br>

<div class="card" >

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

</div>

</aside>

</main>

</div>
<?php 
// echo $user;
if($_SESSION['user'] == 'user'){
  // require 'komen.php';
?>
  <div class="container-fluid">
    <h3>Komentar</h3>
    <div>
      <form action="komen.php" method="POST">
        <textarea name="komentar" id="" rows="10" style="width:100%;"></textarea>
        <button class="btn btn-success" type="submit" name="tambah" style="margin:10px;">Upload</button>
      </form>
    </div>
    <?php
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
<?php }?>
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