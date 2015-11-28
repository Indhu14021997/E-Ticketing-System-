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
            include ("connect.php");
            session_start();
            $user = $_SESSION["id"];
            $date = $_SESSION["date"];
            $class = $_SESSION["class"];
            //echo $date;
            $station = $_GET['name'];
            $schedule = $_GET['schedule'];
            $q = "Select * from seat,schedule,class where schedule.ScheduleNo=" . $schedule . " and schedule.trainNo=seat.TrainNo and seat.empty=0 and class.classNo=".$class.";";
            $c = new connect();
            $conn = $c->con();
            $result = $c->execute($conn, $q);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $query = "Insert into booking values(NULL,'" . $date . "','" . $row["SeatNo"] . "','" . $user . "','0','" . $row["ScheduleNo"] . "');";
                //echo $query;
                $r = $c->insert($conn, $query);
                echo "Booking Done\n";
                echo "Prices ".$row["TicketPrice"];
            }else{
                echo "No Suitable seats found";
            }

            //   echo $station;
            //echo"</br>";
            // echo $train;
            ?>
        </div>

    </body>
</html>
