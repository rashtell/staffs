<?php

include 'connect-db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $result = mysql_query("DELETE FROM staffs WHERE id=$id")

    or die(mysql_error());

    header("Location: view.php");

} else {

    header("Location: view.php");

}
