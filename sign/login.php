<?php

session_start();

if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
    // Pengguna sudah login, alihkan ke halaman yang sesuai
    if ($_SESSION['user'] == "admin") {
        header('Location: ../admin/menu.php');
    } else if ($_SESSION['user'] == "writer") {
        header('Location: ../profile/berita.php');
    } else if ($_SESSION['user'] == "user") {
        header('Location: ../index.php');
    }
    exit;
}

require "../db/koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['nama'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE Username = '$username' AND Pass = '$password'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row["Role"] == "admin") {
            $_SESSION['username'] = $row["ID_Admin"];
            $_SESSION['user'] = $row["Role"];
            header('Location: ../admin/menu.php');
        } else if ($row["Role"] == "writer") {
            $_SESSION['username'] = $row["ID_Admin"];
            $_SESSION['user'] = $row["Role"];
            header('Location: ../profile/berita.php');
        } else if ($row["Role"] == "user") {
            $_SESSION['username'] = $row["ID_Admin"];
            $_SESSION['user'] = $row["Role"];
            header('Location: ../index.php');
        }
        exit;
    }
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

  <script src="sweetalert2.min.js"></script>

  <link rel="stylesheet" href="sweetalert2.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<body>

  <header>

      <nav class="navbar fixed-top navbar-expand-md navbar-light bg-transparent" >

        <div class="container-fluid">

          <!-- <a class="navbar-brand" href="#">

          <img src="assets/Image/icon.png" style="width:180px;" alt="">

          </a> -->

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: right;">

            <ul class="navbar-nav">

              <li class="nav-item">

                <a class="nav-link active" aria-current="page" href="#">Sign In</a>

              </li>
              <li class="nav-item">

                <a class="nav-link" aria-current="page" href="signup.php">Sign Up</a>

              </li>

            </ul>

          </div>

        </div>

      </nav>

  </header>

  <div class="login">

  <div class="card mb-3" style="max-width: 50%; background-color: rgba(0, 0, 0, 0.1);">

  <div class="row g-6">

    <div class="col-md-4" style="padding-top:7%;">

      <img src="../assets/Image/logo.png" class="img-fluid rounded-start" alt="...">

    </div>

    <div class="col-md-8">

      <div class="card-body">

        <h5 class="card-title">Login</h5>

        <form method="POST" id="login">

        <div class="mb-1">

          <label for="exampleInputEmail1" class="form-label">Username</label>

          <input type="text" name="nama" class="form-control" >
          
          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->

        </div>
        <div class="mb-1">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <div id="emailHelp" class="form-text" style="font-weight:bold;">Belum punya akun? <a href="signup.php">Sign Up</a></div>

        <div style="margin-top:5px; float:right; justify-content:center;">
          <button id="tb" class="btn btn-dark" style="margin-right:10px;"><a style="text-decoration:None; color:white;" href="../index.php">Kembali</a></button>
          <button id="tb" type="submit" name="submit" class="btn btn-primary" style="background: -webkit-linear-gradient(right, rgb(48, 48, 162), rgb(93, 93, 189) )">Sign in</button>
        
        
        </div>
          
        </form>
        
      </div>
      
    </div>
    
  </div>

</div>

</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 

<!-- <script src="js/index.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>