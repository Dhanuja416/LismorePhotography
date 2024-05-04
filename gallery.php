<?php
require 'database_file.php';
$db = new database_connection();
$conn = $db->get_con();
$noOfPhotos = 0;
$sql = "SELECT DISTINCT COUNT(photo_id) as photocount FROM gallery_photos;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $noOfPhotos = (int)$row["photocount"];
}

$rowCount = round(($noOfPhotos + 1) / 3);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="pages/css/header.css">
    <link rel="stylesheet" href="pages/css/gallery.css">
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
                               <a class="nav-link act" aria-current="page" href="./gallery.php">Gallery</a>
                             </li>
                           
                             <li class="nav-item">
                               <a class="nav-link" aria-current="page" href="./packages.php">Packages</a>
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
                <h1 class="text-white  display-3 justify-content-center">Browse My Activites</h1>
            </div>
        </div>
    </header>

    <div class="container-fluid image-row-container">
        <?php
        $firstImage = 0;
        while ($rowCount >= 0) {
        ?>
            <div class="container image-container">
                <div class="row">
                    <?php
                    $sql = "SELECT photo_url FROM gallery_photos LIMIT $firstImage,3";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-sm-4">
                                <img src="./images/<?php echo $row['photo_url'] ?>" alt="" class="row-images">
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>


        <?php
            $firstImage = $firstImage+3;
            $rowCount-=1;
        }

        ?>
    </div>



    <?php

    require_once('footer.php');
    ?>
</body>

</html>