<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title></title>
	<style >
		
		 *{
			margin: 0px;
			padding: 2px;
		}
		.reg
		{
			margin-left: 350px;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<h2  class="mission">Sunkhosi Municipality</h2>
<h3 class="mission">Government of Nepal</h3>
<img src="image/sunkhosi.png" class="logo">
<img src="image/visit.png" class="visit">
<img style="max-width:100px;" src="http://municipality.gov.np/sites/default/themes/newmun/nepal.gif" alt="Local Government Logo" class="flag">
<br>
<?php 
require 'connect.php';
$username = $email= $password="";
$usernameError = $emailError = $passwordError="";
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	if (empty($_POST['username'])) {
		$usernameError="Name is required.";
	}else{
	$username = test_input($_POST["username"]);
}
if(empty($_POST['email'])){
	$emailError="Email is required.";
}
else
{
	$email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailError = "Invalid email format";
	}
}
if (empty($_POST['password'])) {
	$passwordError = "password is required.";
}
else{
	$password = test_input($_POST["password"]);
}


if( $usernameError == "" && $emailError =="" && $passwordError ==""){
	$en_pass = sha1($Password);
	$sql ="INSERT into users (username,email,password)
	VALUES('$username','$email','$en_pass	')";

	if(mysqli_query($conn, $sql)){
	$sql ="Insert INTO users (username,email,password)
	VALUES('$username','$email','$en_pass')";

		echo "New record inserted successfully";
	}
else{
	echo "Error:". $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: dashboard.php");
}

}

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 ?>
	<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<fieldset class="reg">
		<h5><strong>Registeration form</strong></h5>
		UserName: <br>
		<input type="text" name="username" placeholder="Name of user">
<br>
Email: <br>
<input type="text" name="email" placeholder="Email of user">
<br>
Password <br>
<input type="text" name="password" placeholder="Password">
<br>
<br>
<input type="submit" value="Register">
</fieldset>
	</form>

</body>
</html>
