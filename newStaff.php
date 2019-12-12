
<?php
//toheeb@mooreadvice.com

function renderForm($name, $fk, $error)
{

    ?>

<!DOCTYPE html>

<html>

<head>

<title>New Staff</title>

</head>

<body>

<?php

    if ($error != '') {

        echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';

    }

    ?>



<form action="" method="post">

<div>
<input type="hidden" name="fk" value="<?php echo $_GET["fk"]; ?>" /><br/>
<strong>name Name: *</strong> <input type="text" name="name" value="<?php echo $name; ?>" /><br/>

<p>* required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}

include 'connect-db.php';

if (isset($_POST['submit'])) {

    $fk = mysql_real_escape_string(htmlspecialchars($_POST['fk']));
    $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));

    if ($name == '') {

        $error = 'ERROR: Please fill in all required fields!';

        renderForm($name, $error);

    } else {

        mysql_query("INSERT staffs SET name='$name', fk='$fk'")

        or die(mysql_error());

        header("Location: staff.php");

    }

} else {

    renderForm('', '');

}

?>