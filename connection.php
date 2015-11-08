<?php

$username = "root";
$password = "";
$database = "system";
mysql_connect(localhost, $username, $password);
@mysql_select_db($database) or die("Unable to select database");
$query = "SELECT * FROM login";
$result = mysql_query($query);
$num = mysql_numrows($result);
mysql_close();
echo "<b>
<center>Database Output</center>
</b>
<br>
<br>";
$i = 0;
while ($i < $num) {
    $ID = mysql_result($result, $i, "field1-name");
    $Name = mysql_result($result, $i, "field2-name");
    $Password = mysql_result($result, $i, "field3-name");
    $Class = mysql_result($result, $i, "field4-name");
    echo "<b>
$ID $Name</b>
<br>
$Password<br>
$Class<br>
<hr>
<br>";
    $i++;
}?>