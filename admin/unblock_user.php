<?php

$user_id=$_GET['id'];

require 'db/config.php';


$update="UPDATE users SET UserStatus='Active' WHERE user_id='$user_id'";
mysqli_query($conn,$update);

header('location:manage_users.php');

?>