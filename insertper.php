<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
	form{
		padding:2px;
		margin-left: 400px;
	}
		.error
		{
			color: red;
		}
	</style>
	<title>Insert</title>
</head>
<body>
<h2  class="mission">Sunkhosi Municipality</h2>
<h3 class="mission">Government of Nepal</h3>
<img src="image/sunkhosi.png" class="logo">
<img src="image/visit.png" class="visit">
<img style="max-width:100px;" src="http://municipality.gov.np/sites/default/themes/newmun/nepal.gif" alt="Local Government Logo" class="flag">
</body>
</html>
<br>
<?php 
require 'connect.php';
$firstname = $lastname = $address = $profession = $dob = $email="";

$firstnameError = $lastnameError = $addressError = $professionError = $dobError = $emailError ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['firstname'])) {
		$firstnameError="FirstName is required.";
	}else{
	$firstname = test_input($_POST["firstname"]);
}
if (empty($_POST['lastname'])) {
	$lastnameError = "lastname is required.";
}
else{
	$lastname = test_input($_POST["lastname"]);
}
if(empty($_POST['address'])){
	$addressError="Address is required.";
}
else{
	$address = test_input($_POST["address"]);
}
	
if (empty($_POST['profession'])) {
	$professionError="Profession/occupation is required.";
}
else{
	$profession = test_input($_POST["profession"]);
}
if (empty($_POST['dob'])) {
	$dobError="Date of birth is required.";
}
else{
	$dob = test_input($_POST["dob"]);
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


if( $firstnameError == "" && $lastnameError == "" && $addressError == "" && $professionError == "" && $dobError =="" && $emailError ==""){
	$sql ="Insert INTO personaldetails (first_name,last_name,address,profession,dob,email)
	VALUES('$firstname','$lastname','$address','$profession','$dob','$email')";

	if(mysqli_query($conn, $sql)){
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

 <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<fieldset>
		<h4> Please fill the form correctly</h4>
		First Name: <br>
		<input type="text" name="firstname" placeholder="firstname" value="<?= $firstname?>">
		<span class="error">* <?php echo "$firstnameError"; ?></span>
<br>
last Name: <br>
<input type="text" name="lastname" placeholder="lastname" value="<?= $lastname?>">
<span class="error">*<?php echo "$lastnameError"; ?></span>
<br>
Address <br>
<input type="text" name="address" placeholder="Address" value="<?= $address?>">  
<span class="error">*<?php echo "$addressError"; ?></span>
<br>
Profession<br>
<input type="text" name="profession" placeholder="Profession/Occupation" value="<?= $profession; ?>">
<span class="error">*<?php echo "$professionError"; ?></span>
<br>
Date of Birth<br>
<input type="text" name="dob" placeholder="Date of birth" value="<?= $dob; ?>">
<span class="error">*<?php echo "$dobError"; ?></span>
<br>
Email<br>
<input type="text" name="email" placeholder="Email" value="<?= $email; ?>">
<span class="error">*<?php echo "$emailError"; ?></span>
<br>
<br>
<input type="submit" value="Save">
<br>
</fieldset>
	</form>