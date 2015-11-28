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
$q = "Select * from customer where name=\"" . $name . "\";";
$c = new connect();
$conn = $c->con();
$result = $c->execute($conn, $query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["Class"] == 1) {
        $r = $c->execute($conn, $q);
        $val = $r->fetch_assoc();
        session_start();
        $_SESSION["id"] = $val["id"];
        header('Location: CustomerProfile.html');
    } else if ($row["Class"] == 2) {
        header('Location: admin1.php');
    }
} else {
    echo "0 results\n";
    echo '<a href="index.html">Go back to the main page</a>.';
}