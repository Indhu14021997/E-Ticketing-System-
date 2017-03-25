<?php

include("connect.php");

class admin {

    public $c;
    public $conn;

    public function __construct() {
        $this->c = new connect();
        $this->conn = $this->c->con();
    }

    public function showClasses() {
        $query = "select * from School";
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $val = $row['class'];
                echo '<tr>' . '<td>' . '<a href="className.php?idVal=' . $val . '">' . 'Class &nbsp' . $val . '</a>' . '</td>' . '</tr>';
            }
        }
    }

    public function showSchedule($id) {
        $query = "select schedule.class, schedule.period, schedule.subject, Days.Day, "
                . "teachers.Name from schedule, Days, teachers where schedule.Day=Days.Number "
                . "and schedule.Teacher=teachers.ID and schedule.class=" . $id;
        $result = $this->c->execute($this->conn, $query);
        if ($result->num_rows > 0) {
            echo '<tr>' . '<td>' . "Class" . '</td>' . '<td>' . "Period" . '</td>' . '<td>' . "Subject" . '</td>' . '<td>' . "Day" . '</td>' . '<td>' . "Teacher" . '</td>' . '</tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>' . '<td>' . $row['class'] . '</td>' . '<td>' . $row['period'] . '</td>' . '<td>' . $row['subject'] . '<td>' . $row['Day'] . '</td>' . '<td>' . $row['Name'] . '</td>' . '</td>' . '</tr>';
            }
        } else {
            self::populateSchedule($id);
            self::showSchedule($id);
        }
    }

    public function populateSchedule($id) {
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 8; $j++) {
                $query = "select * from teacherSubject where not exists (select * from schedule where "
                        . "schedule.Teacher=teacherSubject.Teacher and schedule.Period=" . $j . " and schedule.Day=" . $i . ")";
                $result = $this->c->execute($this->conn, $query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $check = "select * from schedule where Class=" . $id . " and Day=" . $i . " and Period=" . $j;
                        $resultCheck = $this->c->execute($this->conn, $check);
                        $check1 = "select * from schedule where Class=" . $id . " and Day=" . $i . " and Subject='" . $row['Subject'] . "'";
                        $resultCheck1 = $this->c->execute($this->conn, $check1);
                        if (!$resultCheck->num_rows > 0 && !$resultCheck1->num_rows > 0) {
                            $query1 = "INSERT INTO `routine`.`schedule` (`Class`, `Day`, `Period`, `Teacher`, `Subject`) "
                                    . "VALUES ('" . $id . "', '" . $i . "', '" . $j . "', '" . $row['Teacher'] . "', '" . $row['Subject'] . "');";
                            $this->c->insert($this->conn, $query1);
                            //echo $query1 . "<br>";
                        }
                    }
                }
            }
        }
    }

}

?>
