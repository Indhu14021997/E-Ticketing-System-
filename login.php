<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("connect.php");
$name = $_POST ["name"];
$pass = $_POST ["pass"];
$query = "Select * from login where Name=\"" . $name . "\" and Password=\"" . $pass . "\";";
$c = new connect();
$conn = $c->con();
$result = $c->execute($conn, $query);
if ($result->num_rows > 0) {
    header('Location: Home.html');    
} else {
    echo "0 results\n";
    echo '<a href="index.html">Go back to the main page</a>.';
}