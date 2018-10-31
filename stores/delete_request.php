<?php

session_start();

if(!isset($_SESSION['store']))
 {
   header('location:index.php');
 };


$current = date('Y-m-d');

$Store=$_SESSION['store'];
$StoreName=$Store['StoreName'];
$Keyperson=$Store['Keyperson'];
$StoreImage=$Store['StoreImage'];
$StoreID=$Store['StoreID'];

require 'db/config.php';

$RequestID=$_GET['id'];




$sql="DELETE FROM product_request WHERE RequestID='$RequestID'";
 mysqli_query($conn,$sql);
 header("location:my_requests.php");

?>