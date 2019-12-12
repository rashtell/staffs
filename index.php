<!DOCTYPE html>

<html>

<head>

<title>View Deparments</title>

</head>

<body>



<?php

include 'connect-db.php';

$result = mysql_query("SELECT * FROM departments")

or die(mysql_error());

echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";

echo "<table border='1' cellpadding='10'>";

while ($row = mysql_fetch_array($result)) {

    echo "<tr>";

    echo '<td>' . $row['id'] . '</td>';

    echo '<td><a href="staffs.php"?id=' . $row['id'] . '&name=' . $row['name'] . '>' . $row['name'] . '</a></td>';

    echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';

    echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

    echo '<td>' . $row[''] . '</td>';

    echo "</tr>";

}

echo "</table>";

?>

<p><a href="new.php">Add a new department</a></p>



</body>

</html>