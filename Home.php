<html>
    <head>
        <title>User Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <?php
            include ("client.php");
            session_start();
           // echo $_SESSION["id"];
            $source = $_POST["source"];
            $dest = $_POST["dest"];
            $date=$_POST["date"];
            $_SESSION['date']=$date;
            $_SESSION['class']=$_POST["class"];
            $client=new client();
            $client->getSchedule($source, $dest);
            /*
            $query = "Select * from route,schedule,station,train where route.source=\"" . $source . "\" and route.destination=\"" . $dest . "\" and route.id=schedule.RouteNo and schedule.station=station.id and schedule.trainNo=train.no;";
            echo "Source : " . $source . " Destination : " . $dest . "</br>";
            $c = new connect();
            $conn = $c->con();
            $result = $c->execute($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="details.php?name='.$row["name"].'&schedule='.$row["ScheduleNo"].'">' . $row["name"] . "  " . $row["Location"] . "  " . $row["Arrival"] . "  " . $row["Departure"] . "  " . $row["trainName"] . "  " . $row["freeSeat"] . "</a></br>";
                    //$_SESSION['sVar'] = $row["name"];
                }
            } else {
                echo "0 results\n";
            }*/
            echo '<a href="indexUser.html">Go back to the main page</a></br>.';
            echo '<a href="Home.html">Go back to the search page</a>.';
            ?>


        </div>
    </body>
</html>

