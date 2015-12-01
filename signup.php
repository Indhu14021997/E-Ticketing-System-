<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign UP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Login.css"/>
    </head>
    <body>
        <div id="header">
            <h1>Railway</h1>
            <p>E-Ticketing Service</p>
        </div>
        <div id="signup">
            <?php
            include ("client.php");
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $mail = $_POST["email"];
            $client = new client();
            if ($client->submit($name, $pass, $phone, $address, $mail)) {
                echo "Sign up completed";
                echo "</br>";
                $client->details($name);
                 echo '<a href="CustomerProfile.html">Go to User Home</a></br>';
            } else {
                echo "User with given information already exists";
                echo '<a href="index.html">Go to the home page</a>.</br>';
                echo '<a href="signup.html">Go back to signup page</a></br>';
                echo "</br>";
            }
            ?>
        </div>
    </body>
</html>
