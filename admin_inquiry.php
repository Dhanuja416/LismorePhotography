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

if (isset($_GET["id"])) {
    $update_id = $_GET["id"];
}
$first_inquiry = ($page - 1) * 6;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pages/css/inquiry_management.css">
    <title>Lismore Photography</title>
</head>

<body>
    <header>
        <div class="container-fluid header-line">
            <div class="row">
                <div class="col-sm-6 left-column">
                    <h1>Lismore Photography - Inquiry Management</h1>
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


                <div class="col-sm-9">
                    <div class="container-fluide">
                        <div class="row">
                            <div class="col-sm-4 inquiry-form">
                                <form method="post" class="form-inquiry" enctype="multipart/form-data">
                                    <h3 align="center">Reserve For Your Events</h3>


                                    <div class="form-group">
                                        <label for="c_name">Customer Name : </label>
                                        <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Ex:- Kasun Perera " value="<?php if (isset($_SESSION["name"])) {
                                                                                                                                                        echo $_SESSION["name"];
                                                                                                                                                    } ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="tpno">Telephone Number : </label>
                                        <input type="text" class="form-control" id="tpno" name="tpno" placeholder="Ex:- 07XXXXXXXX" value="<?php if (isset($_SESSION["tpno"])) {
                                                                                                                                                echo $_SESSION["tpno"];
                                                                                                                                            } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="e_date">Event Date : </label>
                                        <input type="date" class="form-control" id="e_date" name="e_date" placeholder="Event Date" pattern="\d{4}-\d{2}-\d{2}" value="
                                        <?php if (isset($_SESSION["event_date"])) {
                                            echo $_SESSION["event_date"];
                                        } ?>
                                        ">
                                    </div>

                                    <div class="form-group">
                                        <label for="e_type">Event Type : </label>
                                        <select name="e_type" id="" class="form-control" id="e_type" name="e_type" placeholder="Select Your Event Type">
                                            <option value="<?php if (isset($_SESSION["e_type"])) {
                                                                echo $_SESSION["e_type"];
                                                            } ?>"><?php if (isset($_SESSION["e_type"])) {
                                                                        echo $_SESSION["e_type"];
                                                                    } ?></option>
                                            <option value="Wedding">Wedding</option>
                                            <option value="Birthday Party">Birthday Party</option>
                                            <option value="Wild Life">Wild Life</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="e_venue">Event Venue : </label>
                                        <input type="text" class="form-control" id="e_venue" name="e_venue" placeholder="Ex:- Gampaha" value="<?php if (isset($_SESSION["e_venue"])) {
                                                                                                                                                    echo $_SESSION["e_venue"];
                                                                                                                                                }  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="e_desc">Event Description : </label>
                                        <textarea class="form-control" id="e_desc" name="e_desc" placeholder="Ex:- My Event is ........." rows=3><?php if (isset($_SESSION["e_desc"])) {
                                                                                                                                                        echo $_SESSION["e_desc"];
                                                                                                                                                    } ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="e_status">Event Status: </label>
                                        <select name="e_status" id="" class="form-control" id="e_status" name="e_status" placeholder="Select Your Event Type">
                                            <option value="<?php if (isset($_SESSION["status"])) {
                                                                echo $_SESSION["status"];
                                                            } ?> selected=" selected"><?php if (isset($_SESSION["status"])) {
                                                                                            echo $_SESSION["status"];
                                                                                        }  ?></option>
                                            <option value="Pending" selected="selected">Pending</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Canceled">Canceled</option>
                                        </select>
                                    </div>



                                    <button type="submit" class="btn btn-submit confirm-btn" name="btn_confirm">Confirm Reservation</button>

                                    <button type="submit" class="btn btn-submit update-btn" name="btn_update">Update Reservation</button>
                                    <input type="reset" class="btn btn-reset reset-btn" value="Cancel Reservation">



                                    <?php
                                    if (isset($_POST['btn_confirm'])) {
                                        $cname = $_POST["c_name"];
                                        $tpno = $_POST["tpno"];
                                        $edate = $_POST["e_date"];
                                        $etype = $_POST["e_type"];
                                        $evenue = $_POST["e_venue"];
                                        $edesc = $_POST["e_desc"];
                                        $status = "Pending";
                                        $i_date = date("Y-m-d");

                                        $sql = "INSERT INTO inquiries(i_desc,i_date,c_name,c_tpno,event_date,event_venue,i_status,e_type)VALUES('" . $edesc . "','" . $i_date . "','" . $cname . "','" . $tpno . "','" . $edate . "','" . $evenue . "','" . $status . "','" . $etype . "')";


                                        if ($conn->query($sql) === true) {
                                            echo "<script>alert('Event Confirmed''); 
                                                            location.replace('admin_inquiry.php');    
                                        </script>";
                                        } else {
                                            echo "<script>alert('Event Cannot Confirm'); 
                                                            location.replace('admin_inquiry.php');    
                                        </script>";
                                        }

                                        $_SESSION["name"] = "";
                                        $_SESSION["e_desc"] = "";
                                        $_SESSION["e_type"] = "";
                                        $_SESSION["status"] = "";
                                        $_SESSION["event_date"] = "";
                                        $_SESSION["tpno"] = "";
                                        $_SESSION["e_venue"] = "";
                                    }


                                    if (isset($_POST['btn_update'])) {
                                        $cname = $_POST["c_name"];
                                        $tpno = $_POST["tpno"];
                                        $edate = $_POST["e_date"];
                                        $etype = $_POST["e_type"];
                                        $evenue = $_POST["e_venue"];
                                        $edesc = $_POST["e_desc"];
                                        $status = $_POST["e_status"];

                                        if (isset($_POST["e_date"])) {
                                            $sql = "UPDATE inquiries SET i_desc = '" . $edesc . "', c_name = '" . $cname . "', c_tpno = '" . $tpno . "', event_date = '" . $edate . "', event_venue = '" . $evenue . "', i_status = '" . $status . "', e_type = '" . $etype . "' WHERE i_id = $update_id;
                                            ";
                                        } else {
                                            $sql = "UPDATE inquiries SET i_desc = '" . $edesc . "', c_name = '" . $cname . "', c_tpno = '" . $tpno . "', event_venue = '" . $evenue . "', i_status = '" . $status . "', e_type = '" . $etype . "' WHERE i_id = $update_id;
                                            ";
                                        }

                                        if ($conn->query($sql) === true) {
                                            echo "<script>alert('Details Updated Successfully''); 
                                                location.replace('admin_inquiry.php');    
                                                </script>";
                                        } else {
                                            echo "<script>alert('Details cannot Update'); 
                                                    location.replace('admin_inquiry.php');    
                                                </script>";
                                        }
                                        $_SESSION["name"] = "";
                                        $_SESSION["e_desc"] = "";
                                        $_SESSION["e_type"] = "";
                                        $_SESSION["status"] = "";
                                        $_SESSION["event_date"] = "";
                                        $_SESSION["tpno"] = "";
                                        $_SESSION["e_venue"] = "";
                                    }
                                    ?>
                                </form>
                            </div>


                            <div class="col-sm-8 inquiry-table">
                                <div class="container-fluid inquiry-table-section">
                                    <div class="row">
                                        <div class="title-text">
                                            <h1 class="title text-center">All Reservations</h1>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <table class="table inq-table">
                                            <tr>
                                                <th>Inquiry ID</th>
                                                <th>Customer Name</th>
                                                <th>Customer Contact</th>
                                                <th>Event Date</th>
                                                <th>Event Type</th>
                                                <th>Event Description</th>
                                                <th>Inquired Date</th>
                                                <th>Inquiry Status</th>
                                                <th>Action</th>
                                            </tr>

                                            <?php

                                            $sql = "SELECT * FROM inquiries LIMIT $first_inquiry, 6";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row["i_id"] ?></td>
                                                        <td><?php echo $row["c_name"] ?></td>
                                                        <td><?php echo $row["c_tpno"] ?></td>
                                                        <td><?php echo $row["event_date"] ?></td>
                                                        <td><?php echo $row["e_type"] ?></td>
                                                        <td><?php echo $row["i_desc"] ?></td>
                                                        <td><?php echo $row["i_date"] ?></td>
                                                        <td><?php echo $row["i_status"] ?></td>
                                                        <td><a href="del_upd_inq.php?upd_id=<?php echo $row["i_id"] ?>">Update</a>
                                                            <a href="del_upd_inq.php?del_id=<?php echo $row["i_id"] ?>">Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </table>

                                        <?php
                                        $sql = 'SELECT COUNT(i_id) as count FROM inquiries';
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $pages = ceil($row['count'] / 3);
                                        }

                                        for ($i = 1; $i < $pages; $i++) {

                                        ?>
                                            <a class="btn btn-primary pagination-link" style="width:5%; height:auto; margin-top:10px;" href='admin_inquiry.php?page=<?php echo $i ?>'><?php echo $i ?></a>

                                        <?php
                                        }
                                        ?>
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