<?php

function renderForm($id, $name, $error)
{

    ?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Department</title>

</head>

<body>

<?php

    if ($error != '') {

        echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';

    }

    ?>



<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>Name: *</strong> <input type="text" name="name" value="<?php echo $name; ?>"/><br/>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}

include 'connect-db.php';

if (isset($_POST['submit'])) {

    if (is_numeric($_POST['id'])) {

        $id = $_POST['id'];

        $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));

        if ($name == '') {

            $error = 'ERROR: Please fill in all required fields!';

            renderForm($id, $name, $error);

        } else {

            mysql_query("UPDATE departments SET name='$name' WHERE id='$id'")

            or die(mysql_error());

            header("Location: view.php");

        }

    } else {

        echo 'Error!';

    }

} else {

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

        $id = $_GET['id'];

        $result = mysql_query("SELECT * FROM departments WHERE id=$id")

        or die(mysql_error());

        $row = mysql_fetch_array($result);

        if ($row) {

            $name = $row['name'];

            renderForm($id, $name, '');

        } else {

            echo "No results!";

        }

    } else {

        echo 'Error!';

    }

}

?>