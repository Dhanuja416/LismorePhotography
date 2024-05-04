<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcolm Lismore|Contact US</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/contactus.css">
</head>

<body>


    <section class="contact">
        <img src="images/ContactUS.jpg" alt="ContactUS">
        <h1>Contact Us</h1>

        <form action="" method="POST">

            <div class="contact-flex">

                <div class="inputBox">
                    <span>First Name :</span>
                    <input type="text" name="fname" placeholder="Enter Your First Name" required>
                </div>

                <div class="inputBox">
                    <span>Last Name :</span>
                    <input type="text" name="lname" placeholder="Enter Your Last Name" required>
                </div>

                <div class="inputBox">
                    <sapn>Partner's Name :</sapn>
                    <input type="text" name="pname" placeholder="Enter Your Partner's Name">
                </div>

                <div class="inputBox">
                    <span>Email :</sapn>
                        <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="inputBox">
                    <span>Phone Number:</span>
                    <input type="number" name="mobile" placeholder="Enter your phone number" required>
                </div>

                <div class="inputBox">
                    <span>What kind of session are you inquiring about?</span>

                    <select name="event">

                        <option value="Wedding">Wedding</option>
                        <option value="Special event">Special Event</option>
                    </select>
                </div>

                <div class="inputBox">
                    <span>Choose youe budget plan:</span>
                    <select name="plan">
                        <option value="ivy">Ivy Photography £495</option>
                        <option value="rosie">Rosie Photography £620</option>
                        <option value="victoria">Victoria Photography £860</option>
                        <option value="sapphirw">Sapphire Photography £1,150</option>
                        <option value="vintage">Vintage Photography £1,440</option>
                    </select>
                </div>

                <div class="inputBox">
                    <span>What date is your event?</span>
                    <input type="date" id="event" name="eventdate" required>
                </div>
                <div class="inputBox">
                    <span>Tell me more about your wedding day or your special event:</span>
                    <textarea name="messege" placeholder="I want to make sure we are great fit for the event!" required cols="30" rows="10"></textarea>
                </div>
                <div>
                    <input type="submit" value="Send messege" name="send" class="btn_submit-popup">
                </div>

            </div>
        </form>


    </section>



    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'contact_db');

    if (isset($_POST['send'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pname = $_POST['pname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $event = $_POST['event'];
        $plan = $_POST['plan'];
        $eventdate = $_POST['eventdate'];
        $messege = $_POST['messege'];

        $insert = "INSERT INTO `contact_from`(`First_name`, `Last_name`, `Partner's_name`, `Email`, `Phone_number`, `Event`, `Budget_plan`, `Event_date`, `more_details`) VALUES ('$fname','$lname','$pname','$email','$mobile','$event','$plan','$eventdate','$messege')";

        mysqli_query($conn, $insert);

        header('location: contact_us.php');
    }

    ?>



</body>

</html>