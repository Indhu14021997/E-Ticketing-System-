<html>
    <head>
        <title>Customer Junction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
            include ("client.php");
            session_start();
            $user = $_SESSION["id"];
            $client = new client();
            $name = $client->getName($user);
            $client->listBookings($user);
            echo '<a href="indexUser.html">Go back to the main page</a></br>';
            echo '<a href="Home.html">Go back to the search page</a>.';
            ?>
        </div>
    </body>
</html>
