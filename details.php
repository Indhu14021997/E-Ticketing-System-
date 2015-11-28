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

        <div>
            <?php
            // include ("connect.php");
            include ("client.php");
            session_start();
            $user = $_SESSION["id"];
            $date = $_SESSION["date"];
            $class = $_SESSION["class"];
            $var;
            //echo $class;
            //echo $date;
            //echo $station;
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
                $client->details($clientName);
                if (isset($_POST['submit'])) /* i.e. the PHP code is executed only when someone presses Submit button in the below given HTML Form */ {
                    $_SESSION["seats"] = $_POST['seat'];
                    // Here $var is the input taken from user.
                    $var = $_SESSION["seats"];
                    echo "Number of tickets : " . $var . "</br>";
                    $client->makeBooking($schedule, $class, $var);
                }
            }

            /*
             * 
              $q = "Select * from seat,schedule,class where schedule.ScheduleNo=" . $schedule . " and schedule.trainNo=seat.TrainNo and seat.empty=0 and class.classNo=" . $class . ";";
              echo $q;
              $c = new connect();
              $conn = $c->con();
              $result = $c->execute($conn, $q);
              if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $query = "Insert into booking values(NULL,'" . $date . "','" . $row["SeatNo"] . "','" . $user . "','0','" . $row["ScheduleNo"] . "');";
              //echo $query;
              $r = $c->insert($conn, $query);
              echo "Booking Done\n";
              echo "Prices " . $row["TicketPrice"];
              } else {
              echo "No Suitable seats found";
              }
             */
            //   echo $station;
            //echo"</br>";
            // echo $train;
            ?>
        </div>
        <div>
            <form name="seats" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="seat">
                <input type="submit" name="submit" >
            </form>
   
        </div>

    </body>
</html>
