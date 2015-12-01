<html>
    <head>
        <title>Customer Junction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Status.css"/>
    </head>
    <body>
        <div>
            <h1> Customer Status </h1>
            <table style="border:1px solid black; border-collapse:collapse;" width="1350" height="100"> 

                <tr>

                    <th width="200" bgcolor="#0000FF">
                        E-Ticketing
                    </th>

                </tr>

                <tr height="50">
                    <td  style="border:1px solid black;" width="300">
                        Date
                    </td >
                    <td style="border:1px solid black;" width="200">
                        Seat No.
                    </td>
                    <td style="border:1px solid black;" width="1350">
                        Train
                    </td>
                    <td style="border:1px solid black;" width="450">
                        Arrival Time
                    </td>
                    <td style="border:1px solid black;" width="400">
                        Departure Time
                    </td>
                    <td style="border:1px solid black;" width="400">
                        Source
                    </td>
                    <td style="border:1px solid black;" width="400">
                        Destination
                    </td>
                    <td style="border:1px solid black;" width="250">
                        Class
                    </td>
                    <td style="border:1px solid black;" width="250">
                        Price
                    </td>

                </tr><tr>
                    <?php
                    include ("client.php");
                    session_start();
                    $user = $_SESSION["id"];
                    $client = new client();
                    $name = $client->getName($user);
                    $client->listBookings($user);
                    $client->listNotice($user);
                    ?>
                </tr>
            </table>

        </div>
        <div id="back">
            <a href="CustomerProfile.html">Go back to the main page</a></br>
            <a href="Home.html">Go back to the search page</a>
        </div>
    </body>
</html>
