<html>
    <head>
        <title>Customer Junction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Railway</h1>
            <p>E-Ticketing Service</p>
        </div>
        <div>
            <table style="border:1px solid black; border-collapse:collapse;" width="1350" height="100"> 
                <th width="200" bgcolor="#0000FF">
                    Customer Details
                </th>
                <tr>
                    <?php
                    include ("client.php");
                    session_start();
                    $user = $_SESSION["id"];
                    //echo $user;
                    $client = new client();
                    $name = $client->getName($user);
                    $client->details($name);
                    ?>
                </tr>
            </table>
        </div><div>
            <a href="CustomerProfile.html">Go back to the main page</a>
            </br>
            <a href="Home.html">Go back to the search page</a>
        </div>
    </body>
</html>
