<?php

$id=$_GET['id'];

require 'db/config.php';

$sql="SELECT * FROM store_register  AND strreg_id='$id'";
$result=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($result))
    {
                      
    } 

$update="UPDATE users SET UserStatus='Active' WHERE user_id='$user_id'";
mysqli_query($conn,$update);

header('location:manage_users.php');

?>