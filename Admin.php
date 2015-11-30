<?php

include("connect.php");

class Admin {
    public $c;
    public $conn;

    public function __construct() {
        $this->c = new connect();
        $this->conn = $this->c->con();
    }
    
    public function exists($field, $table, $id) {
        $query = "Select '". $field ."' from '". $table ."' where '". $field ."'='" . $id . "';";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }
    
    public function addSchedule($route_no, $arrival, $departure, $train_no, $station){
       $query = "Insert into schedule values(NULL,'" . $route_no . "','" . $arrival . "','" . $departure . "','" . $train_no . "','" . $station . "');"; 
       $s = $this->c->insert($this->conn, $query);
    }
    
    public function deleteSchedule($id){
        if (self::exists("ScheduleNo","schedule",$id)){
            $query = "Delete from schedule where ScheduleNo='" . $id . "';";
            $s = $this->c->delete($this->conn, $query);
        } else {
            echo "This ID does not exist </br>";
        }
    }
    
    public function updateScheduleTime($id, $arrive, $depart){
        if (self::exists("ScheduleNo","schedule",$id)){
            $query = "Update schedule SET Arrival='" . $arrive . "', Departure='" . $depart . "' where ScheduleNo='" . $id . "';";
            $s = $this->c->delete($this->conn, $query);
        } else {
            echo "No such record exists </br>";
        }
    }
    
    public function addRoute($source, $destination){
       $query = "Insert into route values(NULL,'" . $source . "','" . $destination . "');"; 
       $s = $this->c->insert($this->conn, $query);
    }
    
    public function deleteRoute($ID){
        if (self::exists("id","route",$ID)){
            $query = "Delete from route where id='" . $ID . "';";
            $s = $this->c->delete($this->conn, $query);
        } else {
            echo "This ID does not exist </br>";
        }
    }
}
