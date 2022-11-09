<!DOCTYPE html>
<html >
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
		.ind
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
$sql = "select * from industrial where id=$id";
$result = mysqli_query($conn,$sql);
$name = $level= "";
 if(mysqli_num_rows($result)>0){
 	while($row = mysqli_fetch_assoc($result)){
 		$name = $row['name'];
 		$level = $row['level'];
 	}
 }
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

 	if( $nameError == "" && $levelError == ""){
$sql ="UPDATE industrial set name='$name', level='$level'where id = $id";
	
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

	<fieldset class="ind">
		<h4>Please update the form correctly</h4>
		<br>
		<input type="hidden" name="id" value="<?= $id ?>">
		Name of industry : <br>
		<input type="text" name="name" placeholder="name" value="<?= $name?>">
		<span class="error">* <?php echo "$nameError"; ?></span>
<br>
level of industry : <br>
<input type="text" name="level" placeholder="level" value="<?= $level?>">
<span class="error">*<?php echo "$levelError"; ?></span>
<br>
<br>
<input type="submit" value="Update">
<br>
</fieldset>
	</form>
</body>
</html>
