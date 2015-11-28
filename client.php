<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client
 *
 * @author eshan
 */
include("connect.php");

class client {

    public $c;
    public $conn;

    public function __construct() {
        $this->c = new connect();
        $this->conn = $this->c->con();
    }

    public function submit($name, $pass, $phone, $address, $mail) {
        if (!self::exists($name)) {
            $query1 = "Insert into login values('" . $name . "','" . $pass . "','1');";
            $query2 = "Insert into customer values(NULL,'" . $name . "','" . $phone . "','" . $address . "','" . $mail . "');";
            $r = $this->c->insert($this->conn, $query1);
            $s = $this->c->insert($this->conn, $query2);
            return true;
        }
        return false;
    }

    public function exists($name) {
        $query = "Select Name from login where Name='" . $name . "';";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function details($name) {
        if (self::exists($name)) {
            $query = "Select * from customer where Name='" . $name . "';";
            $result = $this->c->execute($this->conn, $query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "ID : " . $row["id"] . "</br>";
                echo "Name : " . $row["name"] . "</br>";
                echo "Phone : " . $row["phone"] . "</br>";
                echo "Address : " . $row["address"] . "</br>";
                echo "Email : " . $row["mail"] . "</br>";
            }
        }
    }

}
