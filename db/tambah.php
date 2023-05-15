<?php

    session_start();

    require "koneksi.php";
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];

    if($user == '' ){

        header('location:../sign/login.php');

    }else if($user == 'writer' ){

    if(isset($_POST["tambah"])){
        if(isset($_POST['jenis'])) { 

            $jenis = $_POST["jenis"];

          }

        $judul = $_POST["judul"];

        $tanggal = $_POST["tanggal"];

        $isi = $_POST["isi"];

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

            $query = "INSERT INTO artikel VALUES('', '$username' , '$judul', '$jenis','$target_file', now() , '$isi')";

            if (mysqli_query($conn, $query)) {

                echo "Gambar berhasil diunggah.";

            } else {

                echo "Terjadi kesalahan saat menyimpan data ke database.";

            }

        } else {

            echo "Terjadi kesalahan saat mengunggah gambar.";

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
<script>
        function filterSimbol(input) {
            var regex = /[^\w\s]/gi;
            input.value = input.value.replace(regex, '');
        }
</script>

</head>

<body>

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-white" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) );" >
<div class="container-fluid">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a style="color: white;" class="nav-link active" aria-current="page" href="../index.php">Beranda</a>
    </li>
    <li class="nav-item">
        <a style="color: white;" class="nav-link" href="../Main/menu.php">Berita</a>
    </li>
    <li class="nav-item dropdown">

        <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

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
    </ul>
</div>
</div>
</nav>
</header>

<body>

<div class="container">

    <h1 style="text-align:center; margin:5% 0 5%; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-decoration: solid underline rgb(48, 48, 162)  6px;"
    >Tambah Data</h1>

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
                <td><input type="text" name="judul" onkeyup="filterSimbol(this)"></td>
              </tr>
              <tr>
                <th scope="row">Jenis</th>
                <td>:</td>
                <td>
                <select name="jenis">

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
                <td><textarea name="isi" style="width:100%;" rows="40" id="editor"></textarea></td>
              </tr>
            </tbody>
          </table>
          <button id="tb" class="btn btn-success" type="submit" name="tambah" style="margin:10px; float:right; background: linear-gradient(90deg, rgb(48, 48, 162), rgb(93, 93, 189) );"
          >Upload</button>
        </div>

        <!-- <button type="submit" name="tambah">Tambah</button> -->

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
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>
