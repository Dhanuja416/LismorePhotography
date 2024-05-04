<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./pages/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="pages/css/header.css">
  <link rel="stylesheet" href="pages/css/packages.css">
</head>

<body>
  <header class="header">
    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="images\wht logo.png" alt="" width="220" height="80">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./gallery.php">Gallery</a>
              </li>

              <li class="nav-item">
                <a class="nav-link act" aria-current="page" href="./packages.php">Packages</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./pages/About Malcolm.html">About Malcolm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Book Malcolm</a>
              </li>
              <?php
              if (isset($_POST["btn_login"])) {
                echo "<script>
                            location.replace('login.php');
                            </script>";
              }

              ?>
              <form action="" method="post">
                <button class="btn_login-popup" href="login_page.html" name="btn_login">Login</button>
              </form>



            </ul>

          </div>
        </div>
      </nav>

      <!--nav bar ends here-->

      <div class="middle">
        <h1 class="text-white  display-3 justify-content-center">Choose your Package</h1>
      </div>
    </div>
  </header>

  <div class="main1">
  <div class="package">
    <h2>Basic Package</h2>
    <p>Description: </br>
       1 PERSON</br>
      15 MINUTE SESSION</br>
    10 DIGITAL IMAGES</br>
  PHOTO RELEASE WITHIN ONE MONTH</p>
    <p>Price: $100</p>
    <button>Buy Now</button>
  </div>
  <div class="package">
    <h2>Standard Package</h2>
    <p>Description: </br>
       1-2 PERSON</br>
      30 MINUTE SESSION</br>
    20 DIGITAL IMAGES</br>
  PHOTO RELEASE WITHIN TWO WEEKS</p>
    <p>Price: $200</p>
    <button>Buy Now</button>
  </div>
  <div class="package">
    <h2>Premium Package</h2>
    <p>Description: </br>
       1-3 PERSON</br>
      60 MINUTE SESSION</br>
    50 DIGITAL IMAGES</br>
  PHOTO RELEASE WITHIN A WEEK</p>
    <p>Price: $300</p>
    <button>Buy Now</button>
  </div>

  </div>
  




  <?php

  require_once('footer.php');
  ?>
</body>

</html>