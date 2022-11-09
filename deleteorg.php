<?php
require 'connect.php';
 
 $id = $_GET['id'];

 $sql = "DELETE FROM organizational WHERE id =$id";
  if (mysqli_query($conn,$sql)) {
  	echo"Record deleted successfully.";
  }
  else
  {
  	echo"Error deleting record: " .mysqli_error($conn);
  }
  mysqli_close($conn);
  header("location: dashboard.php");


  ?>