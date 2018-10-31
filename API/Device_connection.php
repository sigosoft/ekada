<?php
$conn = mysqli_connect("localhost","works_ekada","works_ekada@123","works_ekada");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>