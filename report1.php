<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .fab 
    {
        font-size: 35px;
        padding:9px;
    }
    
  </style>
</head>
<body>
<h1 id="c4"></h1>
<header>
<div class="container">
<h2  class="mission">Sunkhosi Municipality</h2>
<h3 class="mission">Government of Nepal</h3>
<img src="image/sunkhosi.png" class="logo">
<img src="image/visit.png" class="visit">
<!-- <img style="max-width:100px;" src="http://municipality.gov.np/sites/default/themes/newmun/nepal.gif" alt="Local Government Logo" class="flag"> -->
<img src="image/flag.png" class="flag">
	<ul class="navbar">
		<li><a href="index.php">HOME</a></li>
		<li><a href="introduction.html">INTRODUCTION</a></li>
		<li><a href="news.html">NEWS</a></li>
		<li><a href="report1.php">REPORT</a></li>
		<li><a href="contact.html">CONTACT US</a></li>
		<li><a href="login.php">LOGIN</a></li>
    <a href=""><i class="fab fa-instagram"></i></a>
    <a href=""><i class="fab fa-facebook-f"></i></a>
    <a href=""><i class="fab fa-youtube"></i></a>
    <a href=""><i class="fab fa-linkedin-in"></i></a>
</ul>
</div>
</header>
<h2 style="background-color:black;color:red;margin-top:-5px;font-size:30px;">REPORT</h2>
<p><strong>Report of personal Information</strong></p>
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
 
      </tr>
<?php
    }
   } 

   ?>
    </table>

 <p><strong>Report of organizational information</strong></p>
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
       
      </tr>
<?php
    }
   } 

   ?>
    </table>

<p><strong> Report of industrial information</strong></p>
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
     
      </tr>
<?php
    }
   } 

   ?>
    </table>
</div>

 
<div>
<br>

<a href="#c4" class="Top" method="post"> <button style="background-color: blue;"><i class="fas fa-chevron-up " ></i>
<br> 
 Top </button></a>

<div class="nav">

<ul class="usefull">
	<p >USEFULL LINKS</p>
	<br> 
	<li><a href="">Sites Map<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451252.48180924525!2d85.44092409447029!3d27.92007307421743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ea53b3d28728b5%3A0x1889d815c4c9d090!2sSindhupalchok!5e0!3m2!1sen!2snp!4v1583743171380!5m2!1sen!2snp" width="500" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe></a></li>
	
	<!-- <li><a href=""> a</a></li>
	<li><a href=""> b</a></li>
	<li><a href=""> c</a></li>
	<li><a href=""> d</a></li> -->
	
	
	<br>
</ul>

<ul class="office" style="color: white;background-color: black;">
	<p >OFFICE HOURS</p>
	<br>
	<li><i class="fas fa-sun"></i> Summer</li>
    <li> Sunday - Thursday: 10:00 A.M. - 5:00 P.M.</li>
    <li>Friday: 10:00 A.M. - 3:30 P.M.</li>
   <br>
   <li><i class="far fa-snowflake"></i> Winter</li>
   <li>Sunday - Thursday: 10:00 A.M. - 4:00 P.M.</li>
   <li>Friday: 10:00 A.M. - 3:00 P.M.</li>
  <br>
   <li><i class="far fa-window-close"></i> Close on Public Holidays.</li>
</ul>
<ul class="contact" style="color: white;">
	<p >CONTACT INFO</p>
    <br>
    <li><i class="fas fa-map-marker-alt"></i>  Sunkhosi,Sidhupalchowk</li>
	<li><i class="fas fa-phone-square-alt"></i>  +977-9812356447, +977-9867563456, +977-9867589345</li>
    <li><i class="fas fa-envelope-open-text"></i>  info@sunkhosi.gov.np</li>
    <li><i class="fas fa-tty"></i>  +977 1245678</li>

</ul>
</div>
</body>
</html>