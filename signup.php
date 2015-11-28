<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
} else {
    echo "UserName is taken";
    echo "</br>";
}

echo '<a href="Home.html">Go to the home page</a>.';
