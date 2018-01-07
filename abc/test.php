<!DOCTYPE html>
<html>
<head>
	<title>PHP-Learning</title>
</head>
<?php
	if(isset($_POST['submit'])){
		$ok = true;
		$regex = '/p(---)';
		if (!isset($_POST['username']) || $_POST['username']==='') {
			$ok = false;
		}
		//regex is not working
		elseif (!isset($_POST['password']) || $_POST['password']==='' || preg_match($regex,$_POST['password'])) {
			$ok = false;
		}
		elseif (!isset($_POST['gender']) || $_POST['gender']==='') {
			$ok = false;
		}
		elseif (!isset($_POST['language']) || !is_array($_POST['language'])|| count($_POST['language'])===0) {
			
			$ok = false;
		}
		elseif (!isset($_POST['comment']) || $_POST['comment']==='') {
			$ok = false;
		}
		elseif (!isset($_POST['color']) || $_POST['color']==='') {
			$ok = false;
		}
		elseif (!isset($_POST['tc']) || $_POST['tc']==='') {
			$ok = false;
		}
		if ($ok) {	
		printf('User Name : %s 
				<br> Password : %s 
				<br> Gender : %s
				<br> Favorite : %s
				<br> Languages : %s
				<br> Comment : %s
				<br> Terms and Condition :%s',
				htmlspecialchars($_POST['username']),
				htmlspecialchars($_POST['password']),
				htmlspecialchars($_POST['gender']),
				htmlspecialchars($_POST['color']),
				htmlspecialchars(implode(' ',$_POST['language'])),
				htmlspecialchars($_POST['comment']),
				htmlspecialchars($_POST['tc'])
			);
		}
	}
?>
<body>
<!--
<center>
	<form method = "POST" action="">
		User name:
			 <input type="text" name="username" value=""><br><br>
  		Password:
		  	<input type="password" name="password" value=""><br><br>
			<input type="radio" name="gender" value="male"<?php
			 	if ($gender === 'male'){
					echo '  checked';
				}
				?>> Male<br><br>
		    <input type="radio" name="gender" value="female"<?php
			 	if ($gender === 'female'){
					echo ' checked';
				}
				?>> Female<br><br>
			Favorite Color :
			<select name="color">
				<option value="">Please Select from the list</option>
				<option value="#f00"<?php
				if ($color === '#f00'){
					echo ' selected';
				}
				?>>red</option>
				<option value="#0f0"<?php
				if ($color === '#0f0'){
					echo ' selected';
				}
				?>>green</option>
				<option value="#00f"<?php
				if ($color === '#00f'){
					echo ' selected';
				}
				?>>blue</option>				
			</select><br>
			Language :
			<select multiple name="language[]" size = "3">
				<option value="urdu"<?php
				if (in_array('urdu',$language)){
					echo ' checked';
				}
			  	 ?>>Urdu</option>
				<option value="french"  <?php
				if (in_array('french',$language)){
					echo ' checked';
				}
				?>>French</option>
				<option value="hindi"<?php
				if (in_array('hindi',$language)){
					echo ' checked';
				}
				?>>Hindi</option>				
			</select><br>
			Comment : <textarea rows="10" cols="10" name="comment"></textarea><br>
			<input type="checkbox" name="tc" value="ok"<?php
				if ($tc === 'ok'){
					echo ' checked';
				}
			?>>Ok I accept the Terms and Conditions<br>
			<input type="submit" name="submit" value="Submit">
	</form>
</center>-->

										  <!--mySqli WORK-->
<!--	<center>			
		<form method="POST" action="">
			Name : <input type="text" name="uname" value=""><br>
			Gender : <br><input type="radio" name="gender" value="male"> Male<br>
					 <input type="radio" name="gender" value="female">Female<br>
			Color : <br> <select multiple name="color[]" size = "3">
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="purple">Purple</option>
					 </select>		
					 <input type="submit" name="submit" value="Submit"><br>
					 <input type="text" name="updatetxt" value="" placeholder="enter Id to update"><br>
					 <input type="submit" name="update" value="Update"><br>
					 <input type="text" name="deletetxt" value="" placeholder="enter Id to delete"><br>
					 <input type="submit" name="delete" value="Delete"><br>
					 <input type="submit" name="showdata" value="View Data"><br>		
		</form>
	</center>-->
</body>
<?php
	$db = mysqli_connect('localhost','root','root','PHP');
	if(isset($_POST['submit'])){
		$uname = $_POST['uname'];
		$gender = $_POST['gender'];
		$color = implode(" ",$_POST['color']);
		$query = sprintf("Insert into users(name,gender,color) values('%s','%s','%s')",
		mysqli_real_escape_string($db,$uname),
		mysqli_real_escape_string($db,$gender),
		mysqli_real_escape_string($db,$color));
		
		mysqli_query($db,$query);

		echo"<script>alert('User added...!');</script>";
	}
	if(isset($_POST['delete'])){
		$ID = $_POST['deletetxt'];
		$query = sprintf("Delete from users where Id=%s",mysqli_real_escape_string($db,$ID));

		mysqli_query($db,$query);
	}
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
	}
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
</html>