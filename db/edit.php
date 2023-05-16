<?php
    session_start();
    require "koneksi.php";
    if (isset($_GET['judul'])) {
        $judul = $_GET['judul'];    
    }
    $result = mysqli_query($conn,"SELECT*FROM artikel WHERE Judul ='$judul'");
    $username = $_SESSION['username'];
    if($username == '' ){
        header('location:../sign/login.php');
    }else{
    if(isset($_POST["tambah"])){
        // $judul = $_POST["judul"];
        $nama = $_POST["nama"];
        $tanggal = $_POST["tanggal"];
        $isi = $_POST["isi"];
            $query = "UPDATE artikel SET Judul='$nama' , Waktu=now(), Isi= '$isi' WHERE Judul='$judul'";
            if (mysqli_query($conn, $query)) {
                echo "Gambar berhasil diunggah.";
            } else {
                echo "Terjadi kesalahan saat menyimpan data ke database.";
            }
        echo "<script>
            alert('Berhasil');
            document.location.href='../index.php';    
        </script>";
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
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-white" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );">
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
        <li><a class="dropdown-item" href="../pembinaan.php">Pembinaan</a></li>
        <li><a class="dropdown-item" href="../intelijen.php">Intelijen</a></li>
        <li><a class="dropdown-item" href="../umum.php">Tindak Pidana Umum</a></li>
        <li><a class="dropdown-item" href="../khusus.php">Tindak Pidanan Khusus</a></li>
        <li><a class="dropdown-item" href="../perdata.php">Perdata dan Tata Usaha</a></li>
    </ul>
    </li>
    </ul>
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Profile
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="../../profile/struktur.php">Strutur Organisasi</a></li>
        <li><a class="dropdown-item" href="../../profile/visimisi.php">Visi Misi</a></li>
        <li><a class="dropdown-item" href="../../profile/perintah.php">Perintah Harian</a></li>
        <li><a class="dropdown-item" href="../../profile/doktrin.php">Doktrin</a></li>
        <li><a class="dropdown-item" href="../../profile/tugas.php">Tugas dan Wewenang</a></li>
        </ul>
    </li> -->
    <!-- <div class="collapse navbar-collapse" style="justify-content:right;">
    <ul class="navbar-nav">
    <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="EditText.php">Edit</a>
        </li>
    </ul>
    </div> -->
</div>
</div>
</nav>
</header>
<body>
<div class="container">
    <h1 style="text-align:center; margin:5% 0 5%; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
    >Edit Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">
    <?php
    while($row=mysqli_fetch_assoc($result)){
    echo'
    <div class="table-responsive">
    <table class="table table-light table-striped">
    <form action="" method="POST" enctype="multipart/form-data">
      <tbody>
        <tr>
          <th scope="row">Gambar</th>
          <td>:</td>
          <td><input type="file" name="gambar" accept=".gif,.jpg,.jpeg,.png"></td>
        </tr>
        <tr>
          <th scope="row">Judul</th>
          <td>:</td>
          <td><input type="text" name="nama"  value="'.$row["Judul"].'"></td>
        </tr>
        <tr>
          <th scope="row">Jenis</th>
          <td>:</td>
          <td>
          <select name="judul">

          <option value="international">International</option>

          <option value="politik">Politik</option>

          <option value="olahraga">Olahraga</option>

          <option value="artis">Artis</option>

          <option value="bisnis">Bisnis</option>    

          </select>
      </td>
        </tr>
        <tr>
          <th scope="row">Isi Berita</th>
          <td>:</td>
          <td><textarea name="isi" style="width:100%;" rows="40" id="editor">'.$row["Isi"].'</textarea></td>
        </tr>
      </tbody>
    </table>
  </div>
    ';
    };?>
        <br>
        <button id="tb" class="btn btn-success" type="submit" name="tambah" style="margin:10px; float:right; background: linear-gradient(90deg, rgb(48, 48, 162), rgb(93, 93, 189) );"
        >Upload</button>
    </form>
<?php }?>
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
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>