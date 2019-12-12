<!DOCTYPE html>

<html>

<head>

<title>View <?=$GET["name"]?> Staffs</title>

</head>

<body>



<?php

include 'connect-db.php';

$fk = $_GET["id"];

$result = mysql_query("SELECT * FROM staffs WHERE fk=" . $fk)

or die(mysql_error());

echo "<table border='1' cellpadding='10'>";

while ($row = mysql_fetch_array($result)) {

    echo "<tr>";

    echo '<td>' . $row['id'] . '</td>';

    echo '<td>' . $row['name'] . '</td>';

    echo '<td><a href="editStaff.php?id=' . $row['id'] . '&fk=' . $fk . '">Edit</a></td>';

    echo '<td><a href="deleteStaff.php?id=' . $row['id'] . '">Delete</a></td>';

    echo '<td>' . $row[''] . '</td>';

    echo "</tr>";

}

echo "</table>";

?>

<p><a href="newStaff.php?fk=".<?=$fk?>>Add a new staff</a></p>



</body>

</html>