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
        <input type="submit" name="showdata" value="View Data">
    </form>
        
<?php

    readfile('navigation.html');

    $db = mysqli_connect('localhost','root','root','PHP');
    if(isset($_POST['showdata'])){
        $query = "Select * from users";
        $result = mysqli_query($db,$query);
        foreach($result as $row){
            $id = $row[Id];
            $name = $row[name];
            $gender = $row[gender];
            $color = $row[color];
            printf('<li><span>%s || %s || %s || %s</span></li>',$id,$name,$gender,$color);
        }
    }
?>
</body>
</html>