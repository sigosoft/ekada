<?php

$store_id=$_GET['id'];

require 'db/config.php';


$update="UPDATE stores SET StoreStatus='Active' WHERE StoreID='$store_id'";
mysqli_query($conn,$update);

header('location:manage_stores.php');

?>
