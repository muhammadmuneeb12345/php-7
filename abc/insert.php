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
			Password : <input type="password" name="password" value=""><br>
			Gender : <br><input type="radio" name="gender" value="male"> Male<br>
					 <input type="radio" name="gender" value="female">Female<br>
			Color : <br> <select multiple name="color[]" size = "3">
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="purple">Purple</option>
					 </select>		
					 <input type="submit" name="submit" value="Submit"><br>
		</form>
</center>

<?php

	readfile('navigation.html');
	$db = mysqli_connect('localhost','root','root','PHP');
	if(isset($_POST['submit'])){
		$uname = $_POST['uname'];

		$password = $_POST['password'];
		$hash = password_hash($password,PASSWORD_DEFAULT);

		$gender = $_POST['gender'];
		$color = implode(" ",$_POST['color']);
		$query = sprintf("Insert into users(name,gender,color,pass) values('%s','%s','%s','%s')",
		mysqli_real_escape_string($db,$uname),
		mysqli_real_escape_string($db,$gender),
		mysqli_real_escape_string($db,$color),
		mysqli_real_escape_string($db,$hash));
		
		mysqli_query($db,$query);

		echo"<script>alert('User added...!');</script>";
	}
?>
</body>
</html>