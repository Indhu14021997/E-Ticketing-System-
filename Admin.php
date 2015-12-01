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
        $query = "Select '" . $field . "' from '" . $table . "' where '" . $field . "'='" . $id . "';";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function existsID($id) {
        $query = "Select * from employee where id='" . $id . "';";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function existsRoute($id) {
        $query = "Select * from route where id='" . $id . "';";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function existsSchedule($id) {
        $query = "Select * from schedule where ScheduleNo='" . $id . "';";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function details($id) {
        if (self::existsID($id)) {
            $query = "Select * from employee where id='" . $id . "';";
            $result = $this->c->execute($this->conn, $query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<tr>\n";
                echo "<td style=\"border:1px solid black;\"> " . "ID : " . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["id"] . "</td></br>";
                echo "</tr>\n";
                echo "<tr>\n";
                echo "<td style=\"border:1px solid black;\"> " . "Name : " . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["Name"] . "</td></br>";
                echo "</tr>\n";
                echo "<tr>\n";
                echo "<td style=\"border:1px solid black;\"> " . "Phone : " . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["phone"] . "</td></br>";
                echo "</tr>\n";
                echo "<tr>\n";
                echo "<td style=\"border:1px solid black;\"> " . "Address : " . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["Address"] . "</td></br>";
                echo "</tr>\n";
            }
        }
    }

    public function addSchedule($route_no, $arrival, $departure, $train_no, $station) {
        $query = "Insert into schedule values(NULL,'" . $route_no . "','" . $arrival . "','" . $departure . "','" . $train_no . "','" . $station . "');";
        $s = $this->c->insert($this->conn, $query);
    }

    public function deleteSchedule($id) {
        if (self::existsSchedule($id)) {
            $query = "Delete from schedule where ScheduleNo='" . $id . "';";
            $this->conn->query($query);
            echo "Record Deleted Successfully!! </br>";
        } else {
            echo "This ID does not exist </br>";
        }
    }

    public function updateScheduleTime($id, $arrive, $depart) {
        if (self::existsSchedule($id)) {
            $query = "Update schedule SET Arrival='" . $arrive . "', Departure='" . $depart . "' where ScheduleNo='" . $id . "';";
            $s = $this->c->execute($this->conn, $query);
        } else {
            echo "No such record exists </br>";
        }
    }

    public function getSchedule() {
        $_SESSION["schedule"] = NULL;
        $query = "Select * from schedule;";
        $result = $this->c->execute($this->conn, $query);
        echo "<tr>\n";
        echo "<td style=\"border:1px solid black;\"> " . "Schedule Number" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Route Number" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Arrival time" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Departure time" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Train Number" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Station" . "</td>";
        echo "</tr>\n";
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "<td style=\"border:1px solid black;\">" . $row["ScheduleNo"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["RouteNo"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["Arrival"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["Departure"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["trainNo"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["station"] . "</td></br>";
                echo "</tr>\n";
            }
        } else {
            echo "0 results\n";
        }
    }

    public function addRoute($source, $destination) {
        $query = "Insert into route values(NULL,'" . $source . "','" . $destination . "');";
        $s = $this->c->insert($this->conn, $query);
    }

    public function deleteRoute($ID) {
        if (self::existsRoute($ID)) {
            $query = "Delete from route where id='" . $ID . "';";
            //$this->c>insert($this->conn, $query);
            $this->conn->query($query);
        } else {
            echo "This ID does not exist </br>";
        }
    }

    public function getRoute() {
        $_SESSION["schedule"] = NULL;
        $query = "Select * from route;";
        $result = $this->c->execute($this->conn, $query);
        echo "<tr>\n";
        echo "<td style=\"border:1px solid black;\"> " . "Identification Number" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Source" . "</td>" . "<td style=\"border:1px solid black;\"> " . "Destination" . "</td>";
        echo "</tr>\n";
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "<td style=\"border:1px solid black;\">" . $row["id"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["source"] . "</td>" . "<td style=\"border:1px solid black;\"> " . $row["destination"] . "</td></br>";
                echo "</tr>\n";
            }
        } else {
            echo "0 results\n";
        }
    }

}
