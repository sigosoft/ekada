<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };


$current = date('Y-m-d');



require 'db/config.php';

$RequestID=$_GET['id'];




$sql="UPDATE product_request SET RequestStatus='Approved' WHERE RequestID='$RequestID'";
 mysqli_query($conn,$sql);
 header("location:product_request.php");

?>