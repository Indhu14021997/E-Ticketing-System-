<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("connect.php");
$name=$_POST["name"];
$pass=$_POST["pass"];
$query="Insert into login values(NULL,'".$name."','".$pass."','1');";
$c = new connect();
$conn = $c->con();
$result = $c->insert($conn, $query);
echo "Sign up completed\n";
echo '<a href="Home.html">Go to the home page</a>.';