<?php
session_start();
//session_regenerate_id(true);
include("connection.php");
$check=0;

if(isset($_POST['submit']))
{
$username = $_POST['user_name'];
$password = $_POST['password'];

$query=mysqli_query($connection,"select adminid from admin where adminusername='$username' and adminpassword='$password'")or die ("query 1 incorrect.......");

list($user_id)=mysqli_fetch_array($query);

$_SESSION['user_id']=$user_id;
    $_SESSION["name"] = $username;

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($connection);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <title>Admin Login</title>
</head>
<body>
<div class="container page-header well" align="center">
    <img  src="https://i.pinimg.com/originals/4f/ae/bb/4faebb2031bb2787fda144179e3662a7.jpg">
    <h1 align="center">Welcome &nbsp;
        </h1>
    <div align="center">
        <form action="login.php" method="post" id="login" name="login" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" style="font-size:18px; width:250px" class="input-lg" name="user_name" id="user_name" placeholder="User-Name" required autofocus>
            </div>
			<br>
            <div class="form-group">
                <input type="password" class="input-lg" name="password" style="font-size:18px; width:250px" id="password" placeholder="Password" required>
            </div>
            <p><br></p>
            <div class="form-group">
                <button class="btn btn-large btn-lg btn-success" type="submit" name="submit" id="submit">Log in</button>
                <a href="../profile.php"><button class="btn btn-large btn-lg btn-success" type="" name="" id="">Cancel</button></a>
            </div>

        </form>
    </div>
</div>
</body>
</html>