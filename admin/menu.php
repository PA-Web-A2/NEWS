<?php

session_start();
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
} else {
  // handling ketika $_SESSION['user'] belum di-set
  $user = '';
}
require "../db/koneksi.php";

if (isset($_POST['upload'])) {
  $_SESSION["upload"]="upload";
  $result = mysqli_query($conn,"SELECT*FROM berita");
}else if(isset($_POST['writer'])){
  $result = mysqli_query($conn,"SELECT*FROM artikel");
  $_SESSION["upload"]="";
}else{
  $result = mysqli_query($conn,"SELECT*FROM berita");
  $_SESSION["upload"]="upload";
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<?php 
  if($user != 'admin' ){

    header('location:../index.php');

}else{
?>

<body>

<?php 
include 'navbar.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
<div style="width:100%; background-color:lightgrey;">

<br>

<!-- <img src="assets/Image/img1.jpg" style="width: 100%; margin-top:5%;" alt=""> -->
<h1 class="slb" style="text-align:center; padding: 5% 0 5% 0; font-weight:bold; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"
>SEMUA BERITA</h1>

<div class="row" style="justify-content:center; margin:0;">

  <form class="row" style="justify-content:center; margin:0;" action="" method="post">
    <button id="tb" type="submit" style="width:auto; margin-right:5px; background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))" class="btn btn-primary" name="upload">
        Ter Upload
    </button>
    <button id="tb" type="submit" style="width:auto; margin-left:5px; background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))" class="btn btn-primary" name="writer">
        Writer
    </button>
  </form>
<?php

while($row=mysqli_fetch_assoc($result)){

    echo '<div class="col-sm-3" style="margin:1.5%;">

    <div id="box" class="card" style="min-height:35rem;">

        <img src="../db/'.$row["Gambar"].'" class="card-img-top" alt="...">

        <div class="card-body">

        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>';

        // <h6 class="card-title text-left" id="harga">'.implode(' ', array_slice(str_word_count($row["Isi"], 1), 0, 30)).'</h6>

        echo'
        </div>
        <button id="tb" class="btn btn-dark" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189))">
          <a href="berita.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Baca Selengkapnya</a>
        </button>
        ';
        echo '
        <div style="text-align:center; margin:2%;">
        ';
        if ($_SESSION["upload"] != "upload") {
        echo '
        <button id="tb" class="btn btn-primary" onclick="confirmUpload(\''.$row["Judul"].'\')">
        Upload
        </button>
        <button id="tb" type="button" class="btn btn-danger" onclick="confirmDelete(\''.$row["Judul"].'\')">
          Hapus
        </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          function confirmDelete(judul) {
            Swal.fire({
              title: "Konfirmasi",
              text: "Apakah Anda yakin ingin menghapus?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              confirmButtonText: "Hapus",
              cancelButtonText: "Batal"
            }).then((result) => {
              if (result.isConfirmed) {
                // Lakukan aksi penghapusan di sini, seperti mengarahkan ke halaman hapus.php dengan judul sebagai parameter
                window.location.href = "hapus.php?judul=" + judul;
              }
            });
          }
          function confirmUpload(judul) {
            Swal.fire({
              title: "Konfirmasi",
              text: "Apakah Anda yakin ingin mengupload konten ini?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "primary",
              cancelButtonColor: "warning",
              confirmButtonText: "Upload",
              cancelButtonText: "Batal"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "upload.php?judul=" + judul;
              }
            });
          }          
        </script>
        ';
        }else{
        echo '
        <button id="tb" type="button" class="btn btn-danger" onclick="confirmDelete(\''.$row["Judul"].'\')">
          Hapus
        </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          function confirmDelete(judul) {
            Swal.fire({
              title: "Konfirmasi",
              text: "Apakah Anda yakin ingin menghapus?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              confirmButtonText: "Hapus",
              cancelButtonText: "Batal"
            }).then((result) => {
              if (result.isConfirmed) {
                // Lakukan aksi penghapusan di sini, seperti mengarahkan ke halaman hapus.php dengan judul sebagai parameter
                window.location.href = "../db/hapus.php?judul=" + judul;
              }
            });
          }
        </script>
        ';
        }
        echo '
            ';
        echo '
        </div>
        </div>';
}
?>


</div>

</div>

<?php }?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
</body>

</html>