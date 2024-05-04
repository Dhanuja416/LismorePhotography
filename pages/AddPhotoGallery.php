<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcolm Lismore|Upload Photo</title>
    <style>
        body {
            font-family: 'Calibri';
            background-image: url('pics/login02.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }



       h1 {
            font-family: 'Calibri' !important;
            color: white;
            font-size: 40px;
        }



       .dectext {
            width: 300px;
            height: 40px;
            padding: 5px;
            margin-top: 20px;
            border: grey solid 1px;
            border-radius: 5px;
        }



       .decbtn {
            width: 310px;
            height: 50px;
            padding: 5px;
            margin-top: 20px;
            border-radius: 5px;
            border: #00223b solid 1px;
            background-color: #00223b;
            color: whitesmoke;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div style="background-color: #030303b3; width: 325px; margin: auto; margin-top: 100px; padding:50px; border-radius: 20px;  text-align: center; -webkit-box-shadow: 0px 0px 24px 7px rgba(0,0,0,0.66); -moz-box-shadow: 0px 0px 24px 7px rgba(0,0,0,0.66);box-shadow: 0px 0px 24px 7px rgba(0,0,0,0.66);">
        <form action="addProductpage.php" method="POST" enctype ="multipart/form-data">



           <h1>Upload Photos</h1>



           <input type="text" name="pname" placeholder="Picture Name" class="dectext">
           <select name="pcategory" class="dectext">
                <option value="">--Select Category--</option>
                <option value="Landscapes">Landscapes</option>
                <option value="Wildlife">Wildlife</option>
                <option value="Weddings">Weddings</option>
                <option value="SpecialEvents">Special Events</option>
            </select>



           <input type="number" name="pqty" placeholder="Product Quantity" class="dectext">

           <input type="number" name="pprice" placeholder="Product Price" class="dectext">

           <input type="file" name="ppic" placeholder="Product Image" class="dectext">

           <textarea name="pdes" placeholder="Product Description" class="dectext"></textarea>
           
           
            <br><br>
            

           <input type="submit" value="submit" class="decbtn">
        
            <br><br>



       </form>
    </div>
<?php 

if (isset($_POST["pname"])){
    $pronm = $_POST["pname"];
    $proBrand = $_POST["pbrand"];
    $prodes = $_POST["pdes"];
    $proprice = $_POST["pprice"];
    $proqty = $_POST["pqty"];
    $propic1 = "";

    $server_name = "localhost";
    $db_uname = "root";
    $db_pass = "";
    $db_name = "projectdb";

    $conn = mysqli_connect($server_name, $db_uname, $db_pass, $db_name);
    $is_ok_to_add_product = false;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {

        $sql = "SELECT * From product where pname ='" . $pronm . "'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('There is already a product in this name.. Try again..');</script>";
            $_POST["pname"] = null;
        } else {
            $is_ok_to_add_product = true;
        }
        $conn->close();
    }
    //------------------------------------------------------Are there any product already from this name?





    if ($is_ok_to_add_product) {

        //------------------------------------------------------Pic upload

        // Check if file was uploaded without errors
        if (isset($_FILES["ppic"]) && $_FILES["ppic"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["ppic"]["name"];
            $filetype = $_FILES["ppic"]["type"];
            $filesize = $_FILES["ppic"]["size"];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            // Verify MYME type of the file
            if (in_array($filetype, $allowed)) {
                // Check whether file exists before uploading it
                if (file_exists("pic/" . $filename)) {
                    echo $filename . " is already exists.";
                } else {
                    move_uploaded_file($_FILES["ppic"]["tmp_name"], "pics/" . $filename);
                    $propic1 = "pics/" . $filename;
                }
            } else {
                echo "Error: There was a problem uploading your file. Please try again.";
            }
        } else {
            echo "Error: " . $_FILES["ppic"]["error"];
        }


        //------------------------------------------------------Pic upload


        $conn = mysqli_connect($server_name, $db_uname, $db_pass, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {


            $sql = "INSERT INTO product (pname, pbrand, pdes, ppic, pprice, pqty) VALUES ('" . $pronm . "', '" . $proBrand . "', '" . $prodes . "', '" . $propic1 . "', '" . $proprice . "' , '" . $proqty . "')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New product added successfully');</script>";
                $_POST["pname"] = null;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
}




    




?>
</body>
</html>