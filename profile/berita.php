<?php

session_start();
$user = $_SESSION['user'];
$username = $_SESSION['username'];
require "../db/koneksi.php";

$result = mysqli_query($conn,"SELECT*FROM artikel WHERE ID_Admin='$username'");

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

      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );">

          <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">

              <ul class="navbar-nav">

                <li class="nav-item">

                  <a style="color: white;" class="nav-link" aria-current="page" href="../index.php">Beranda</a>

                </li>

                <li class="nav-item">

                  <a style="color: white;" class="nav-link active" href="#">Berita</a>

                </li>

                  <li class="nav-item dropdown">

                  <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    Bidang

                  </a>

                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="../bidang/pembinaan.php">Pembinaan</a></li>

                    <li><a class="dropdown-item" href="../bidang/intelijen.php">Intelijen</a></li>

                    <li><a class="dropdown-item" href="../bidang/umum.php">Tindak Pidana Umum</a></li>

                    <li><a class="dropdown-item" href="../bidang/khusus.php">Tindak Pidanan Khusus</a></li>

                    <li><a class="dropdown-item" href="../bidang/perdata.php">Perdata dan Tata Usaha</a></li>

                  </ul>

                </li>

              </ul>

            </div>

            <div class="collapse navbar-collapse" style="justify-content:right;">

            <ul class="navbar-nav">

              <li class="nav-item">

                    <a class="nav-link active" aria-current="page" href="../db/tambah.php">Create</a>

                </li>

            </ul>

            </div>

          </div>

        </nav>

  </header>
<?php
  $id= $_SESSION["username"];
  if(isset($_POST["save"])){
  $target_dir = "uploads/";

  // Definisikan nama file dan path-nya

  $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

  && $imageFileType != "gif" ) {

      echo "Hanya file gambar yang diperbolehkan.";

      exit;

  }

  

  // Pindahkan file yang diupload ke direktori yang dituju

  if (!file_exists($target_dir)) {

      mkdir($target_dir, 0777, true);

  }

  if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {

      // Simpan alamat gambar ke database

      $query = "UPDATE admin SET Gambar = '$target_file' WHERE ID_Admin='$id'";

      if (mysqli_query($conn, $query)) {

          echo "Gambar berhasil diunggah.";

      } else {

          echo "Terjadi kesalahan saat menyimpan data ke database.";

      }

  } else {

      echo "Terjadi kesalahan saat mengunggah gambar.";

  }}
?>
<div style="width:100%;">

<br>

<!-- <img src="assets/Image/img1.jpg" style="width: 100%; margin-top:5%;" alt=""> -->
<div class="text-center" style="padding: 5% 0 5% 0;">
  <?php
    $ID =  mysqli_query($conn,"SELECT * FROM admin WHERE ID_Admin = '$id'");
    while($row=mysqli_fetch_assoc($ID)){
      if($row["Gambar"] == NULL){
        
        echo'<img src="uploads/pria.png" style="width:10%" class="rounded mx-auto d-block" alt="...">';
      }else{
        echo'<img src="'.$row["Gambar"].'" style="width:10%" class="rounded mx-auto d-block" alt="...">
        ';
      }
      echo'<br>
      <button type="button" style="margin:0 0 0 0; width:auto;" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ganti
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ganti Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST" enctype="multipart/form-data" >
              <input type="file" name="gambar" accept=".gif,.jpg,.jpeg,.png">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save">Save changes</button>
              </div>
              </form>
          </div>
        </div>
      </div>';
    echo'
      <h3>'.$row["Username"].'</h3>';
    $ID =  mysqli_query($conn,"SELECT COUNT(*) AS Jumlah FROM artikel WHERE ID_Admin = '$id';");
    while($rows=mysqli_fetch_assoc($ID)){
      echo 
      '<div class="row" style="width:100%; justify-content:center;" >
      <div class="col-2"><h5>Konten : '.$rows["Jumlah"].'</h5></div>
      <div class="col-2"><h5>'.$row["Gender"].'</h5></div>
      ';}}
  ?>
  </div>
</div>

<h1 style="text-align:center; padding: 8% 0 5% 0; font-weight:bold; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
>MY NEWS</h1>

<div class="row" style="justify-content:center; margin:0;">

<?php

while($row=mysqli_fetch_assoc($result)){

    echo '<div class="col-sm-3" style="margin:1.5%;">

    <div id="box" class="card" style="min-height:35rem;">

        <img src="../db/'.$row["Gambar"].'" class="card-img-top" alt="...">

        <div class="card-body">

        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>

        </div>
        <button id="tb" class="btn btn-dark">
        <a href="show.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Baca Selengkapnya</a>
        </button>
        '?> 
        <?php
              echo'
              <div style="text-align:center; margin:2%;">
              <button id="tb" class="btn btn-primary">
              <a href="../db/edit.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Edit</a>
              </button>
              <button id="tb" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

                    <a href="../admin/hapus.php?judul='.$row["Judul"].'"style="text-decoration:None; color:white;">Hapus</a>
        
                    </button>
                  </div>
                </div>
              </div>
            </div>';
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