<?php

      session_start();

      $_SESSION['username']="";

      require "db/koneksi.php";



      $result = mysqli_query($conn,"SELECT*FROM admin");

      while($row=mysqli_fetch_assoc($result)){

        if(isset($_POST['submit'])) {

            $username = $_POST['nama'];

            $password = $_POST['password'];

            if(isset($_POST['role'])) { 

              $selectedOption = $_POST['role']; 

              $_SESSION['role'] = $selectedOption; 

            }

            if($username == $row["Username"] && $password == $row["Pass"]){

                $_SESSION['username'] = $row["ID_Admin"];

                $_SESSION['user'] = $row["Username"];

                header('Location: index.php');

            }

            echo '<script type ="text/JavaScript">';  

            echo 'alert("Inputan salah bro")';  

            echo '</script>'; 

          }

      }

      ?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>KEJAKSAAN</title>

  <link rel="stylesheet" href="assets/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 

  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 

  crossorigin="anonymous">

</head>

<body>

  <header>

      <nav class="navbar navbar-expand-md navbar-light bg-light" >

        <div class="container-fluid">

          <a class="navbar-brand" href="#">

          <img src="assets/Image/icon.png" style="width:180px;" alt="">

          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: right;">

            <ul class="navbar-nav">

              <li class="nav-item">

                <a class="nav-link active" aria-current="page" href="#">Sign In</a>

              </li>

            </ul>

          </div>

        </div>

      </nav>

  </header>

  <div style="padding:5%; display: flex; justify-content: center; align-items: center;">

  <div class="card mb-3" style="max-width: 50%;">

  <div class="row g-0">

    <div class="col-md-4">

      <img src="assets/Image/iconic.jpg" class="img-fluid rounded-start" alt="...">

    </div>

    <div class="col-md-8">

      <div class="card-body">

        <h5 class="card-title">Login</h5>

        <form method="POST" id="login">

        <div class="mb-3">

          <label for="exampleInputEmail1" class="form-label">Username</label>

          <input type="text" name="nama" class="form-control" >

          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        </div>

        <div class="mb-3">

          <label for="exampleInputPassword1" class="form-label">Password</label>

          <input type="password" name="password" class="form-control" id="exampleInputPassword1">

        </div>

        <button type="submit" name="submit" class="btn btn-primary" style="float:right;">Sign in</button>

	<button class="btn btn-dark" style="float:right; margin-right:10px;"><a style="text-decoration:None; color:white;" href="index.php">Kembali</a></button>

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

</body>

</html>