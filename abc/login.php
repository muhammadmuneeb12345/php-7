<?php
    session_start();

    $message = '';

    if(isset($_POST['uname']) && isset($_POST['pass'])){
        $db = mysqli_connect('localhost','root','root','PHP');

        $query = sprintf("Select * from users where name='%s'",mysqli_real_escape_string($db,$_POST['uname']));

        $result = mysqli_query($db,$query);

        $row = mysqli_fetch_assoc($result);

        if($row){   
            $hash = $row['pass'];
            $isAdmin = $row['isAdmin'];
            if(password_verify($_POST['pass'],$hash)){
                $message = 'Login Success...!';
                $_SESSION['user'] = $row['name'];
                $_SESSION['isAdmin'] = $isAdmin;
                //echo "Success";
                //echo "<script>alert('Login Success...!');</script>";
            }else{
               $message = 'Login Failed...!';
                // echo "<script>alert('Login Failed...!');</script>";
            }
        }
        else{
            $message = 'Login Failed...!';
            //echo "<script>alert('Login Failed...!');</script>";
        }
        mysqli_close($db);

    }    

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
            User Name : <input type="text" name="uname" value=""><br>
            Password : <input type="password" name="pass" value=""><br>
            <button type="submit" name="submit">Login</button>      
        </form>
    </center>
    <?php
    readfile('navigation.html');

    echo "<script>alert('Login Success...!');</script>";
       
    ?>
</body>
</html>