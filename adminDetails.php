<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Railway</h1>
            <p>E-Ticketing Service</p>
        </div>
        <div>Admin Panel</div>
        <div>
            <?php
            include ("Admin.php");
            session_start();
            $id = $_SESSION["id"];
            // echo $id;
            $admin = new Admin();
            if ($admin->existsID($id)) {
                echo "<table style=\"border:1px solid black; border-collapse:collapse;\" width=\"1350\" height=\"100\">";
                echo "<th width=\"200\" bgcolor=\"#0000FF\">Admin Details</th><tr>";
                $admin->details($id);
                echo "</tr></table>";
            }
            ?>
        </div><div>
            <a href="Admin_Interface.html">Go back to the main page</a>
        </div>
    </body>
</html>
