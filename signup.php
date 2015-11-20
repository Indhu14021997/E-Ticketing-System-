<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("connect.php");
$name=$_POST["name"];
$pass=$_POST["pass"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$mail=$_POST["email"];
$query1="Insert into login values('".$name."','".$pass."','1');";
$query2="Insert into customer values(NULL,'".$name."','".$phone."','".$address."','".$mail."');";
//echo $query1;
//echo $query2;
$c = new connect();
$conn = $c->con();
$r=$c->insert($conn, $query1);
$s=$c->insert($conn, $query2);
echo "Sign up completed\n";
echo '<a href="Home.html">Go to the home page</a>.';