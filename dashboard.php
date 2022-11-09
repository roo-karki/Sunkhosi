<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
}
table
{
 
  border-color:#ddddff;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="">Personal information</a>
<a href="insertper.php">-Insert personal information</a>
<a href="">-Update personal information</a>
<a href="">-Delete personal information</a>
 </li>
  <li><a href="">Organizational Information</a>
<a href="insertorg.php">-Insert organizational information</a>
<a href="">-Update organizational information</a>
<a href="">-Delete orginzational information</a>
</li>
  <li><a href="">Industrial Information</a>
<a href="insertind.php">-Insert Industrial information</a>
<a href="">-Update Industrial information</a>
<a href="">-Delete Industrial information</a>
</li>
  <li>
    <a href="registeration.php">Add new Users</a>
    <a href="logout.php">Log out</a>

  </li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>View personal Information</h2>
<?php 
require 'connect.php';
$sql = "select * from personaldetails";
$result = mysqli_query($conn,$sql);

   ?>
  
  <table border="solid skyblue" cellpadding="15px" cellspacing="1px">
    <tr>
    <th>S.N</th>
    <th>Id</th>
    <th>Firstname</th>
    <th>lastname</th>
    <th>Address</th>
    <th>Profession</th>
    <th>Date of birth</th>
    <th>Email</th>
    <th>Action</th>
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
          <a href="updateper.php?id=<?= $row['id']; ?>">Update /</a>
          <a onclick= "return confirm('Are you sure you want to delete ?')" href="deleteper.php?id=<?= $row['id']; ?>">Delete</a>
        </td>
      </tr>
<?php
    }
   } 

   ?>
    </table>

<h3><strong>View organizational information</strong></h3>
<?php
require 'connect.php';
$sql = "select * from organizational";
$result = mysqli_query($conn,$sql);


?>

  <table border="solid blue" cellpadding="15px" cellspacing="2px">
    <tr>
    <th>S.N</th>
    <th>Id</th>
    <th>Name of orgnization</th>
    <th>Address</th>
    <th>Type</th>
    <th>Phone Number</th>
    <th>Action</th>
    </tr>
<?php 
if (mysqli_num_rows($result)>0) {
    $count = 0;
    while($row = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td><?= ++$count;?></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['address']; ?></td>
        <td><?= $row['type']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td>
          <a href="updateorg.php?id=<?= $row['id']; ?>">Update /</a>
          <a onclick= "return confirm('Are you sure you want to delete ?')" href="deleteorg.php?id=<?= $row['id']; ?>">Delete</a>
        </td>
      </tr>
<?php
    }
   } 

   ?>
    </table>

<h4><strong> View industrial information</strong></h4>
<?php  
require 'connect.php';
$sql = "select * from industrial";
$result = mysqli_query($conn,$sql);

?>
 
  <table border="1px solid black" cellpadding="20px">
    <tr>
    <th>S.N</th>
    <th>Id</th>
    <th>Name</th>
    <th>level</th>
    <th>Action</th>
    </tr>
<?php 
if (mysqli_num_rows($result)>0) {
    $count = 0;
    while($row = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td><?= ++$count;?></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['level']; ?></td>
        <td>
          <a href="updateind.php?id=<?= $row['id']; ?>">Update /</a>
          <a onclick= "return confirm('Are you sure you want to delete ?')" href="deleteind.php?id=<?= $row['id']; ?>">Delete</a>
        </td>
      </tr>
<?php
    }
   } 

   ?>
</table>
</div>
</body>
</html>

