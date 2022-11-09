<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
require 'connect.php';
$sql = "select * from personaldetails";
$result = mysqli_query($conn,$sql);

	 ?>
	 <a href="create.php">Add new record</a>
	<table border="1px solid black" cellpadding="20px">
		<tr>
		<th>S.N</th>
		<th>id</th>
		<th>firstname</th>
		<th>lastname</th>
		<th>address</th>
		<th>profession</th>
		<th>dob</th>
		<th>email</th>
		<th>action</th>
		</tr>
	
	

	<?php 

if (mysqli_num_rows($result)>0) {
		$count = 0;
	 	while($row = mysqli_fetch_assoc($result)){
	 		?>
	 		<tr>
	 			<td><?= ++$count;?></td>
	 			<td><?= $row['id']; ?></td>
	 			<td><?= $row['first_name']; ?></td>
	 			<td><?= $row['last_name']; ?></td>
	 			<td><?= $row['address']; ?></td>
	 			<td><?= $row['profession']; ?></td>
	 			<td><?= $row['dob']; ?></td>
	 			<td><?= $row['email']; ?></td>
	 			<td>
	 				<a href="edit.php?id=<?= $row['id']; ?>">Edit /</a>
	 				<a onclick= "return confirm('Are you sure you want to delete ?')" href="delete.php?id=<?= $row['id']; ?>">Delete</a>
	 			</td>
	 		</tr>
<?php
	 	}
	 } 

	 ?>
    </table>

</body>
</html>