<html>
    <head>
        <title>User Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Status.css"/>
    </head>
    <body>
         <div>
                <h1>Railway</h1>
                <p>E-Ticketing Service</p>
            </div>
        <div>
            <?php
            include ("client.php");
            session_start();
            $source = $_POST["source"];
            $dest = $_POST["dest"];
            $client = new client();
            echo "<table style=\"border:1px solid black; border-collapse:collapse;\" width=\"1350\" height=\"100\"> ";
            echo "<th width=\"200\" bgcolor=\"#0000FF\">Train Schedule</th>";
            echo "<tr>";
            $client->getRawSchedule($source, $dest);
            echo "</tr>";
            echo "</table>";
            ?>
        </div>
        <div id="back">
            <a href="index.html">Go back to the main page</a></br>
            <a href="newHome.html">Go back to the search page</a></div>
    </body>
</html>

