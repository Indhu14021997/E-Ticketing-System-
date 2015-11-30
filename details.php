<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="header">
            <h1>Railway</h1>
            <p>E-Ticketing Service</p>
        </div>
        <div>
            <?php
            include ("client.php");
            session_start();
            $user = $_SESSION["id"];
            $date = $_SESSION["date"];
            $class = $_SESSION["class"];
            $var = 0;
            if (!isset($_SESSION['schedule']) && empty($_SESSION['schedule'])) {
                $_SESSION["schedule"] = $_GET['schedule'];
            }
            if (!isset($_SESSION['station']) && empty($_SESSION['station'])) {
                $_SESSION["station"] = $_GET['name'];
            }
            $station = $_SESSION['station'];
            $schedule = $_SESSION['schedule'];
            $client = new client();
            $clientName = $client->getName($user);
            if ($client->exists($clientName)) {
                echo "<table style=\"border:1px solid black; border-collapse:collapse;\" width=\"1350\" height=\"100\"> ";
                echo "<th width=\"200\" bgcolor=\"#0000FF\">Customer Details</th>";
                $client->details($clientName);
                if (isset($_POST['submit'])) {
                    $_SESSION["seats"] = $_POST['seat'];
                    $var = $_SESSION["seats"];
                    echo "Number of tickets : " . $var . "</br>";
                    $cost = $client->CheckBooking($schedule, $class, $var);
                }
                if (isset($_POST['sub'])) {
                    $client->makeBooking($schedule, $class, $_SESSION["seats"], $date, $user);
                    header('Location: CustomerDet.php');
                }
            }
            ?>

        </div>
        <div>
            <form name="seats" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="seat"></br>
                <input type="submit" name="submit" value="Check Out Total Price" >
            </form>

        </div>
        <div>
            Please note that once you request for booking you will not be able to modify or change the booking in any way </br>
            You will not get any refunds </br>
            Proceed with caution.
        </div>
        <div>
            <form name="sub" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="submit" name="sub" value="Request for Booking">
            </form>
        </div>
        <div id="back">
            <a href="CustomerProfile.html">Go back to the main page</a></br>
            <a href="Home.html">Go back to the search page</a></div>
    </body>
</html>
