<?php 

session_start();


require 'db/config.php';

$delivery_id=$_GET['id'];




$sql="DELETE FROM delivery_charge WHERE delivery_id=$delivery_id";
 mysqli_query($conn,$sql);
 
 header("location:manage_deliverycharge.php");

?>
