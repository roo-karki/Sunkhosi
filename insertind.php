<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		.error
		{
			color: red;
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
</body>
</html>
<?php 
require 'connect.php';
$name = $level= "";

$nameError = $levelError ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['name'])) {
		$nameError="Name of industry is required.";
	}else{
	$name = test_input($_POST["name"]);
}
if (empty($_POST['level'])) {
	$levelError = "level of industry is required.";
}
else{
	$level = test_input($_POST["level"]);
}


if( $nameError == "" && $levelError == "")
{
	$sql ="Insert INTO industrial (name,level)
	VALUES('$name','$level')";

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

	<fieldset style="margin-left:400px;margin-top:100px;">
		<h2>Please fill the form correctly</h2>
		Name of industry : <br>
		<input type="text" name="name" placeholder="Name" value="<?= $name?>">
		<span class="error">* <?php echo "$nameError"; ?></span>
<br>
level of industry : <br>
<input type="text" name="level" placeholder="Level" value="<?= $level?>">
<span class="error">*<?php echo "$levelError"; ?></span>
<br>
<br>
<input type="submit" name="submit" value="Save">
<br>
</fieldset>
	</form>


