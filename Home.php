<html>
    <head>
        <title>User Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Status.css"/>
    </head>
    <body>
        <div>
            <div>
                <h1>Railway</h1>
                <p>E-Ticketing Service</p>
            </div>
            <div>
                <table style="border:1px solid black; border-collapse:collapse;" width="1350" height="100"> 
                    <tr>                   
                        <?php
                        include ("client.php");
                        session_start();
                        $source = $_POST["source"];
                        $dest = $_POST["dest"];
                        $date = $_POST["date"];
                        $_SESSION['date'] = $date;
                        $_SESSION['class'] = $_POST["class"];
                        $client = new client();
                        $client->getSchedule($source, $dest);
                        ?>
                    </tr>
                </table>
            </div></div>
        <div id="back">
            <a href="CustomerProfile.html">Go back to the main page</a></br>
            <a href="Home.html">Go back to the search page</a></div>
    </body>
</html>

