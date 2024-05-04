<?php

require('class.php');
require('database_file.php');
session_start();
$db = new database_connection();
$conn = $db->get_con();

if (isset($_POST["btn_login"])) {
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $UType = $_POST['user-type'];
    $Tpno = $_POST['tpno'];
    $password = $_POST['password'];
    $Email = $_POST["username"];

    $sql = "INSERT INTO usertable(UFname,ULname,UEmail,UTPNo,UType)VALUES('$Fname','$Lname','$Email','$Tpno','$UType')";
    if ($conn->query($sql) === true) {
        $inserted_id = $conn->insert_id;
        echo "<script>alert('You registered Successfully: $inserted_id');

        </script>";
        $sql = "INSERT INTO login(username,UserID,name,password,user_role)VALUES('$Email',$inserted_id,'$Fname','$password','$UType');";
        if ($conn->query($sql) === true) {
            echo "<script>alert('You added to the Login');</script>";
        }else{
            echo "<script>alert('Cannot Added')</script>";
        }
    } else {
        echo "<script>alert('Cannot Register.. Try Again');</script>";
    }
}

?>

<body>
    <header class="header1">
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
                                <a class="nav-link act" aria-current="page" href="index.php">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="gallery.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gallery
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Landscapes</a></li>
                                    <li><a class="dropdown-item" href="#">Wildlife</a></li>
                                    <li><a class="dropdown-item" href="#">Weddings</a></li>
                                    <!-- <li><a class="dropdown-item" href="#">Portraits</a></li>-->
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Special Events</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="packages.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Packages
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Ivy Photography £495</a></li>
                                    <li><a class="dropdown-item" href="#">Rosie Photography £620</a></li>
                                    <li><a class="dropdown-item" href="#">Victoria Photography £860</a></li>
                                    <li><a class="dropdown-item" href="#">Sapphire Photography £1,150</a></li>
                                    <li><a class="dropdown-item" href="#">Vintage Photography £1,440</a></li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="About Malcolm.html">About Malcolm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Book Malcolm</a>
                            </li>


                        </ul>

                    </div>
                </div>
            </nav>

            <!--nav bar ends here-->

            <section1 class="box">
                <div class="wrapper">


                    <div class="form-box login">
                        <div class="h2-top">
                            <h2>SignUp</h2><br>
                        </div>
                        <form name="login_form" method="post">

                            <div class="input-box">
                                <input type="text" name="fname" placeholder="First Name">
                                <label>First Name</label>
                            </div>

                            <div class="input-box">
                                <input type="text" name="lname" placeholder="Last Name">
                                <label>Last Name</label>
                            </div>

                            <div class="input-box">
                                <input type="text" name="user-type" placeholder="User Type" value="Customer">
                                <label>User Type</label>
                            </div>

                            <div class="input-box">
                                <input type="text" name="tpno" placeholder="Contact No">
                                <label>Contact No</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><i class='bx bxl-gmail'></i></span>
                                <input type="email" name="username" placeholder="Email">
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                                <input type="password" name="password" placeholder="Password">
                                <label>Password</label>
                            </div>
                            <button type="submit" class="btn" name="btn_login">Register</button>
                            <div class="login-register">
                                <p>Already have an account?<a href="login.php" class="register-link">Login</a></p>
                            </div>
                        </form>
                    </div>


                    <?php
                    if (isset($_POST["btn_login"])) {
                        $un = $_POST["username"];
                        $pw = $_POST["password"];

                        if ($un == "" || $pw == "") {
                            echo "<script>alert('Username or password cannot be empty');</script>";
                        } else {
                            $sql = "SELECT password, user_role,name FROM login WHERE username = '$un'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $db_pw = $row["password"];
                                    $db_role = $row["user_role"];
                                    $_SESSION['admin_name'] = $row['name'];
                                }

                                if ($db_pw == $pw) {
                                    echo "<script>alert('Login Successful. Welcome $db_role');
                      location.replace('admin_dashboard.php');
                  </script>";
                                } else {
                                    echo "<script>alert('Try Again......!!!!!!!');</script>";
                                }
                            }
                        }
                    }

                    ?>

                </div>
            </section1>
        </div>
    </header>
</body>

</html>