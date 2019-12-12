<?php

function renderForm($name, $error)
{

    ?>

<!DOCTYPE html>

<html>

<head>

<title>New Department</title>

</head>

<body>

<?php

    if ($error != '') {

        echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';

    }

    ?>



<form action="" method="post">

<div>

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

    $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));

    if ($name == '') {

        $error = 'ERROR: Please fill in all required fields!';

        renderForm($name, $error);

    } else {

        mysql_query("INSERT departments SET name='$name'")

        or die(mysql_error());

        header("Location: view.php");

    }

} else {

    renderForm('', '');

}

?>