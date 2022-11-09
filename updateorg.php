<!DOCTYPE html>
<html>
<head lang="en" dir="ltr">
		<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">

	<style media="screen">
		.error
		{
			color: red;
		}
		*{
			margin: 0px;
			padding: 2px;
		}
		.org
		{
			margin-left: 350px;
			margin-top: 20px;
		}
	</style>
	<title></title>
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
$sql = "select * from organizational where id=$id";
$result = mysqli_query($conn,$sql);
$name = $address = $type = $phone ="";
 if(mysqli_num_rows($result)>0){
 	while($row = mysqli_fetch_assoc($result)){
 		$name = $row['name'];
 		$address = $row['address'];
 		$type = $row['type'];
 		$phone= $row['phone'];
 		
 	}
 }

 $nameError = $addressError = $typeError = $phoneError ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['name'])) {
		$nameError="Name of organization is required.";
	}else{
	$name = test_input($_POST["name"]);
}

if(empty($_POST['address'])){
	$addressError="Address is required.";
}
else{
	$address = test_input($_POST["address"]);
}
	
if (empty($_POST['type'])) {
	$typeError="Type of organization is required.";
}
else{
	$type = test_input($_POST["type"]);
}
if (empty($_POST['phone'])) {
	$phoneError="Phone number  is required.";
}
else{
	$phone= test_input($_POST["phone"]);
}	


$id = $_POST['id'];

 if( $nameError == "" && $addressError == "" && $typeError == "" && $phoneError ==""){
$sql ="UPDATE organizational set name='$name',address='$address',type='$type',phone='$phone' where id = $id";
	
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
<form method="post" action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
<fieldset class="org">
		<h2>Please Update the form correctly</h2>
		<br>
		<input type="hidden" name="id" value="<?= $id ?>">
		Name of organization: <br>
		<input type="text" name="name" placeholder="name" value="<?= $name?>">
		<span class="error">* <?php echo "$nameError"; ?></span>
<br>
Address <br>
<input type="text" name="address" placeholder="Address" value="<?= $address?>">  
<span class="error">*<?php echo "$addressError"; ?></span>
<br>
Type of organization<br>
<input type="radio" name="type" value="Government"   <?= $type == 'Government' ? 'checked' :''; ?>>Government
<input type="radio" name="type" value="Private" <?= $type == 'Private' ? 'checked' :''; ?>>Private
<input type="radio" name="type" value="Educational" <?= $type == 'Educational' ? 'checked' : ''; ?>>Educational
<input type="radio" name="type" value="Hospitals" <?= $type == 'Hospitals' ? 'checked' : ''; ?>>Hospitals

<span class="error">*<?php echo "$typeError"; ?></span>
<br>
Phone Number<br>
<input type="text" name="phone" placeholder="Phone Number" value="<?= $phone; ?>">
<span class="error">*<?php echo "$phoneError"; ?></span>
<br>
<br>
<input type="submit" value="Update">
<br>
</fieldset>
	</form>
</body>
</html>
