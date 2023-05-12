<?php

  session_start();

    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
  }else {
      // handling ketika $_SESSION['user'] belum di-set
      $user = '';
      $_SESSION['user']='';
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="../js/search.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<body>

  

  <?php
    include 'navbar.php';
    

    require "../db/koneksi.php";

    if (isset($_GET['judul'])) {
      
      $judul = $_GET['judul'];
      $results = mysqli_query($conn,"SELECT*FROM berita WHERE Judul ='$judul'");
    }
    if (isset($_SESSION['username'])) {
      $id = $_SESSION['username'];
    }else {
        // handling ketika $_SESSION['user'] belum di-set
        $id = '';
        $_SESSION['username']='';
    }
    while($data=mysqli_fetch_assoc($results)){
    $berita = $data["ID_Berita"];
    $admin = $_SESSION["username"];
    if (isset($_POST['rate'])) {
      $rate = $_POST['rate'];
    }
    if(isset($_POST["save"])){
        $query = "SELECT*FROM rate WHERE (ID_Admin='$admin' AND ID_Berita='$berita')";
        $hasil = mysqli_query($conn, $query);
        if(mysqli_num_rows($hasil) > 0) {
          $query = "UPDATE rate SET Rating = '$rate'   WHERE (ID_Admin='$admin' AND ID_Berita='$berita')";
          mysqli_query($conn, $query);
        }else{
          $query = "INSERT INTO rate VALUES('$berita','$admin','$rate')";
          mysqli_query($conn, $query);
        }
    }}
    $result = mysqli_query($conn,"SELECT*FROM berita WHERE Judul ='$judul'");
  ?>

<div style="width:100%;">

<br>

<h1 style="text-align:center; padding: 3%; font-weight:bold; margin-top: 5%; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
>BERITA</h1>

<main>

<div id="content" article class="card" style="box-shadow: 5px 3px 3px 1px rgb(57, 55, 55);">

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

<div style="padding: 3%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">

    <div class="input-group mb-3">
    <form action="" method="post">
      <input id="searchField" autocomplete="off" name="data" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width:350px;" onkeyup="search()">
      <div>
        <ul class="dropdown-menu" id="searchDropdown">
        <li class="dropdown-item">
          <a href="berita.php?judul=${results[i]}">${results[i].judul}</a>
        </li>
        </ul>
      </div>  
      <button id="tb" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189));">Search</button>
    </form>
    </div>

</div>

<br>

<div class="card" >

  <div id="tb" class="card-header">

    Berita Terbaru

  </div>

  <ul class="list-group list-group-flush">

    <li id="tb" class="list-group-item">Berita Lama</li>

    <li id="tb" class="list-group-item">Yang Teratas</li>

    <li id="tb" class="list-group-item">Selebritas</li>

  </ul>

</div>
<div>
</div>
</aside>

</main>

</div>
<?php 
if($_SESSION["user"] == 'user'){
?>
  <div class="container-fluid">
    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Rating</h3>
    <?php
    $hasil = mysqli_query($conn, "SELECT*FROM rate WHERE (ID_Admin='$admin' AND ID_Berita='$berita')");
    // echo $user;
    while($row=mysqli_fetch_assoc($hasil)){
    if($_SESSION['username']=$row["ID_Admin"]){
      echo '<div class="card">
            <div class="card-header">
              '.$row["Rating"].'
            </div>
            </div>';
    }
        }
      // }
    ?>
    <div>
    <form action="" method="post">
      <div class="modal-body">
        <select name="rate" class="form-select" id="inputGroupSelect01">
        <option value="None">None</option>
        <option value="Sangat Buruk">Sangat Buruk</option>
        <option value="Buruk">Buruk</option>
        <option value="Cukup Baik">Cukup Baik</option>
        <option value="Baik">Baik</option>
        <option value="Sangat Baik">Sangat Baik</option>
        </select>
      </div>
      <div class="modal-footer">
        <button id="tb" type="submit" class="btn btn-primary" name="save" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );">Save</button>
      </div>
      <script src="sweetalert2.all.min.js"></script>
    </form>
    </div>
    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Komentar</h3>
    <div>
      <form action="komen.php" method="POST">
        <textarea name="komentar" id="" rows="10" style="width:100%;"></textarea>
        <div class="modal-footer">
        <button id="tb" class="btn btn-success" type="submit" name="tambah" style="margin:10px; background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );"
        >Upload</button>
      </div>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>