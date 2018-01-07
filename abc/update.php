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
<center>			
		<form method="POST" action="">
			Name : <input type="text" name="uname" value=""><br>
			Gender : <br><input type="radio" name="gender" value="male"> Male<br>
					 <input type="radio" name="gender" value="female">Female<br>
			Color : <br> <select multiple name="color[]" size = "3">
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="purple">Purple</option>
					 </select>		
					 <input type="text" name="updatetxt" value="" placeholder="enter Id to update"><br>
					 <input type="submit" name="update" value="Update"><br>		
		</form>
</center>  
</body>
<?php

readfile('navigation.html');

    $db = mysqli_connect('localhost','root','root','PHP');
	if(isset($_POST['update'])){
		$name = $_POST['uname'];
		$id = $_POST['updatetxt'];
		$gender = $_POST['gender'];
		$color = implode(" ",$_POST['color']);
		$query = sprintf("Update users set name='%s',gender='%s',color='%s' where Id='%s'",
		mysqli_real_escape_string($db,$name),
		mysqli_real_escape_string($db,$gender),
		mysqli_real_escape_string($db,$color),
		mysqli_real_escape_string($db,$id));
		mysqli_query($db,$query);
    
		echo"<script>alert('User Updated...!');</script>";
    }
?>
</html>