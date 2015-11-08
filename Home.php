<html>
    <head>
        <title>User Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <?php
            include ("connect.php");

            $source = $_POST["source"];
            $dest = $_POST["dest"];
            $query = "Select * from route where source=\"" . $source . "\" and destination=\"" . $dest . "\";";
            $c = new connect();
            $conn = $c->con();
            $result = $c->execute($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        echo "Source: " . $row["source"] . " - Destination: " . $row["destination"] . " - Arrival: " . $row["arrival_time"] ." -Departure:  ".$row["departure_time"]." - Train No:". $row["train_no"] ."<br>";
                    }
            } else {
                echo "0 results\n";
                echo '<a href="index.html">Go back to the main page</a>.';
            }
            ?>


        </div>
    </body>
</html>

