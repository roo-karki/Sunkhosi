 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title></title>
	<meta charset="utf-8">
  <style media="screen">
    .error {
      color: red;
    }
    *{
			margin: 0px;
			padding: 2px;
		}
		.per
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
$id = $_GET['id'];
$sql = "select * from personaldetails where id = $id";
$result = mysqli_query($conn,$sql);
$firstname = $lastname = $address = $profession = $dob = $email="";
 if(mysqli_num_rows($result)>0){
 	while($row = mysqli_fetch_assoc($result)){
 		$firstname = $row['first_name'];
 		$lastname = $row['last_name'];
 		$address = $row['address'];
 		$profession = $row['profession'];
 		$dob = $row['dob'];
 		$email = $row['email'];
 	}
 }

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
$id = $_POST['id'];

if( $firstnameError == "" && $lastnameError == "" && $addressError == "" && $professionError == "" && $dobError =="" && $emailError ==""){
	$sql ="UPDATE personaldetails set first_name='$firstname',last_name='$lastname',address='$address',profession='$profession',dob='$dob',email='$email'where id = $id";
	
	if(mysqli_query($conn, $sql)){
		echo "Record updated successfully";
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
 <form action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]);?>"method="post">

	<fieldset class="per">
		<h4>Please update the form correctly</h4>
		<input type="hidden" name="id" value="<?= $id ?>">
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
<input type="submit" value="Update">
<br>
</fieldset>
</form>
</body>
</html>
