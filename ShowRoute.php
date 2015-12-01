<html>
    <head>
        <title>Schedule Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Status.css"/>
    </head>
    <body>
        <div>
            <div>
                <h1>Railway E-Ticketing Service</h1>
                <p>Route Details</p>
            </div>
            <div>
                <table style="border:1px solid black; border-collapse:collapse;" width="1350" height="100"> 
                    <tr>                   
                        <?php
                        include ("Admin.php");
                        session_start();
                        $admin = new Admin();
                        $admin->getRoute();
                        ?>
                    </tr>
                </table>
            </div></div>
    </body>
</html>

