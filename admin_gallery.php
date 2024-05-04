<?php
session_start();
$admin_name = $_SESSION['admin_name'];
require('class.php');
require('database_file.php');

$db = new database_connection();
$conn = $db->get_con();


if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$first_image = ($page - 1) * 3;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pages/css/gallery_management.css">

    <title>Lismore Photography</title>
</head>

<body>
    <header>
        <div class="container-fluid header-line">
            <div class="row">
                <div class="col-sm-6 left-column">
                    <h1>Lismore Photography - Gallery Management</h1>
                </div>
                <div class="col-sm-6 right-columns justify-content-end text-end">
                    <h1><?php echo $admin_name ?></h1>
                </div>
            </div>
        </div>
    </header>


    <main>
        <div class="container-fluid main-content">
            <div class="row">
                <div class="col-sm-3 side-bar">
                    <ul class="side-bar-content">
                        <li class="side-bar-item"><a href="admin_gallery.php" class="side-bar-link">Gallery</a></li>
                        <li class="side-bar-item"><a href="admin_inquiry.php" class="side-bar-link">Inquiries</a></li>
                        <li class="side-bar-item"><a href="" class="side-bar-link">Users</a></li>
                        <li class="side-bar-item"><a href="" class="side-bar-link">Events</a></li>
                        <li class="side-bar-item"><a href="" class="side-bar-link">Payments</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 upload-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4 form-section">
                                <h1 class="form-topic">Upload Your Image</h1>
                                <div class="container input-form">

                                    <form class="image-upload" method="post" enctype="multipart/form-data">
                                        <input type="file" name="input_image" class="file-input"> <br>

                                        <button type="submit" class="submit-btn" name="btn-submit" value="Upload This Image">Upload Image</button>
                                    </form>
                                </div>

                                <?php
                                if (isset($_POST['btn-submit'])) {
                                    $filename = $_FILES["input_image"]["name"];
                                    $tmp = $_FILES["input_image"]["tmp_name"];
                                    $folder_name = './images/' . $filename;


                                    if (move_uploaded_file($tmp, $folder_name)) {
                                        $sql = "INSERT INTO gallery_photos(photo_url) VALUES('$filename');";
                                        $result = $conn->query($sql);
                                        if ($result === true) {
                                            echo "<script>alert('Image uploaded successfully');
                                                            location.replace('admin_gallery.php');
                                                        </script>";
                                        } else {
                                            echo "<script>alert('Image Uploading Failed');
                            
                                                        </script>";
                                        }
                                    }
                                }

                                ?>
                            </div>
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-6 gallery-section">
                                <table class="photo-table">
                                    <tr class="header-row">
                                        <th>Photo ID</th>
                                        <th>Photo</th>
                                    </tr>

                                    <?php
                                    $sql = "SELECT * FROM gallery_photos LIMIT $first_image,3 ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr class="img-row">
                                                <td>
                                                    <h1><?php echo $row['photo_id']; ?></h1>
                                                </td>
                                                <td><img src="./images/<?php echo $row['photo_url']; ?>" class="table-image"></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan=2>No Record Found</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>

                                <?php
                                $sql = 'SELECT COUNT(photo_id) as count FROM gallery_photos';
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $pages = ceil($row['count'] / 3);
                                }

                                for ($i = 1; $i <= $pages; $i++) {
                                    $current_page = $i;
                                ?>
                                    <a class="btn btn-primary pagination-link" style="width:5%; height:auto; margin-top:10px;" href='admin_gallery.php?page=<?php echo $i ?>'><?php echo $i ?></a>

                                <?php
                                }


                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>


    <div class="container ">

    </div>

</body>

</html>