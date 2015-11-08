<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>display </title>
        <meta charset="UTF-8">
        <meta nyame="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <?php

        class connect {

            public function con() {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "system";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                return $conn;
            }

            public function execute($con,$sql) {
                $result = $con->query($sql);
                return $result;
            }

        }
        ?>
    </body>
</html>