 <!DOCTYPE html>
<html lang="en">
<head>
<?php session_start();?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<style type="text/css">
		.error
		{
			color: red;
		}
.home{
color:white; 
background-color: #4CAF50;
box-sizing: border-box;
list-style:none;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
  
}
.home:hover{
	text-decoration: none;
    opacity: 0.8;

}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
 
}
button:hover {
  opacity: 0.8;
}
.one
{
  margin-left:280px;
  margin-top:2px;
 
}

	</style>
</head>
<body>
<h2  class="mission">Sunkhosi Municipality</h2>
<h3 class="mission">Government of Nepal</h3>
<img src="image/sunkhosi.png" class="logo">
<img src="image/visit.png" class="visit">
<!-- <img style="max-width:100px;" src="http://municipality.gov.np/sites/default/themes/newmun/nepal.gif" alt="Local Government Logo" class="flag"> -->
<img src="image/flag.png" class="flag">
<br>
	
 <div class="container" style="background-image: url(image/picture2.jpg);height:100%;background-repeat:no-repeat;width:100%;margin-left:130px;">

	<br>
	<form action="" method="post" class="one">
	<h1>Login</h1>
	<img src="image/lock.png" height="70px;">
	<div class="form-group">
	<fieldset>
	Username: <input type="text" name="username">
	<hr>
	Password: <input type="password" name= "password">
    <hr>
	<button><i class="fas fa-sign-in-alt"> Login</i></button>
	<hr>
	<li><a href="index.php"class="home" style="width:40%;margin-left:-20px; "><i class="fas fa-home"></i>HOME</a></li>
	<br>

	</fieldset>
	</div>
	</form>
	</div>
	
	<?php
	$username= $password ="";
	$usernameError = $passwordError ="";
	if ($_SERVER["REQUEST_METHOD"] =="POST") {
		require 'connect.php';
		if(empty($_POST['username'])){
	$usernameError="Username is required.";
}
else
{
	$Username = $_POST['username'];
	
}
if(empty($_POST['password'])){
	$passwordError="Password is required.";
}
	else{
		$Password = $_POST['password'];
	}	
		
		$en_pass = sha1($Password);
		$sql = "SELECT * from users WHERE username = '$Username' AND password ='$en_pass'";
		$res = mysqli_query($conn,$sql);
		if (mysqli_num_rows($res) > 0) 
		{
		$data= mysqli_fetch_assoc($res);
		$_SESSION['Name']=$data['name'];
		$_SESSION['Username']=$data['username'];
        
        header("Location:dashboard.php");	
		}
		else {
			echo "Invalid username or password!";
		}
}
?>





</body>
</html>