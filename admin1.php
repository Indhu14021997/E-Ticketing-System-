<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>admin1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div
        <?php
        include ("connect.php");
        $query = "Select * from booking,schedule,route,train where booking.checked=0 and schedule.routeNo=route.id and booking.ScheduleNo=schedule.ScheduleNo and train.no=schedule.trainNo;";
        $c = new connect();
        $conn = $c->con();
        $result = $c->execute($conn, $query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
             echo "Date: ".$row["date"]." Customer ID: ".$row["customerNo"]." Source: ".$row["source"]." Destination: ".$row["destination"]." Arrival Time: ".$row["Arrival"]." Departure Time: ".$row["Departure"]." Train Name: ".$row["trainName"]." Free Seats: ".$row["freeSeat"]."</br>";   
                
            }
        }
        ?>
    </div>
</body>
</html>
