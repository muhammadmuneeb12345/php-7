
<?php
	require('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="deletetxt" value="" placeholder="enter Id to delete"><br>
		<input type="submit" name="delete" value="Delete"><br>
    </form>			 
</body>
<?php

readfile('navigation.html');

$db = mysqli_connect('localhost','root','root','PHP');
if(isset($_POST['delete'])){
    $ID = $_POST['deletetxt'];
    $query = sprintf("Delete from users where Id=%s",mysqli_real_escape_string($db,$ID));

    mysqli_query($db,$query);
}
?>
</html>