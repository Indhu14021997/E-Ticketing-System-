<html>
    <head>
        <title>Route Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Status.css"/>
    </head>
    <body>
        <div>
            <div>
                <h1>Railway E-Ticketing Service</h1>
                <p>Record Added Successfully!!</p>
            </div>
            <div>
                <table style="border:1px solid black; border-collapse:collapse;" width="1350" height="100"> 
                    <tr>                   
                        <?php
                        include ("Admin.php");
                        session_start();
                        $source = $_POST["src"];
                        $destination = $_POST["des"];
      
                        $admin = new Admin();
                        $admin->addRoute($source, $destination);
                        echo 'Here are the details of the Schedules.';
                        $admin->getRoute();
                        ?>
                    </tr>
                </table>
            </div></div>
    </body>
</html>

