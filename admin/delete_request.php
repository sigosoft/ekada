<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };


$current = date('Y-m-d');


require 'db/config.php';

$RequestID=$_GET['id'];




$sql="DELETE FROM product_request WHERE RequestID='$RequestID'";
 mysqli_query($conn,$sql);
 header("location:product_request.php");

?>