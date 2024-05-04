<?php
session_start();
$admin_name = $_SESSION['admin_name'];
require('class.php');
require('database_file.php');

$db = new database_connection();
$conn = $db->get_con();


$sql = "SELECT COUNT(i_id) as Total_Count FROM inquiries;";
$sql1 = "SELECT COUNT(i_id) as Pending_Count FROM inquiries WHERE i_status = 'Pending'";
$sql2 = "SELECT COUNT(i_id) as Completed_Count FROM inquiries WHERE i_status = 'Completed'";
$sql3 = "SELECT COUNT(photo_id) as photo_Count FROM gallery_photos";

$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $allcount = $row["Total_Count"];
    }
}

if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $pendingcount = $row["Pending_Count"];
    }
}

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $completedcount = $row["Completed_Count"];
    }
}

if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $photocount = $row["photo_Count"];
    }
}



if (isset($_POST['btn-logout'])) {
    session_destroy();
    echo "<script>location.replace('index.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lismore - Admin Dashboard</title>
    <link rel="stylesheet" href="./pages/css/admin_dashboard.css">
</head>

<body>
    <header>
        <div class="container-fluid header-line">
            <div class="row">
                <div class="col-sm-6 left-column">
                    <h1>Lismore Photography - Admin Panel</h1>
                </div>
                <div class="col-sm-6 right-columns justify-content-end text-center">
                    <div class="container">
                        <div class="row">
                            <h1><?php echo $admin_name ?></h1>
                            <form action="" method="POST">
                                <input type="submit" class="logout-btn" value="Logout" name="btn-logout">
                            </form>
                        </div>

                    </div>

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
                <div class="col-sm-9 widget-bar">
                    <div class="container card-container">
                        <div class="row">
                            <div class="col-sm-6 card card1">
                                <div class="card-box">
                                    <h1 class="Card-title">
                                        Inquiries
                                    </h1>
                                    <div class="card-body text-center">
                                        <h1 class="body-text"><?php echo $allcount ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card card2">
                                <div class="card-box">
                                    <h1 class="Card-title">
                                        Gallery Images
                                    </h1>
                                    <div class="card-body text-center">
                                        <h1 class="body-text"><?php echo $photocount ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 card card3">
                                <div class="card-box">
                                    <h1 class="Card-title">
                                        Completed Events
                                    </h1>
                                    <div class="card-body text-center">
                                        <h1 class="body-text"><?php echo $completedcount ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card card4">
                                <div class="card-box">
                                    <h1 class="Card-title">
                                        Pending Events
                                    </h1>
                                    <div class="card-body text-center">
                                        <h1 class="body-text"><?php echo $pendingcount ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>