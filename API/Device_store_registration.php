<?php

 include 'Device_connection.php';

 $name=$_POST['name'];
 $store_name=$_POST['store_name'];
 $mobile=$_POST['mobile'];
 $address=$_POST['address'];
 $email=$_POST['email'];
 $validate=mysqli_query($conn,"SELECT * FROM store_register WHERE  mobile='$mobile'");
 
 if(mysqli_num_rows($validate)>0)
 {

  $pass['Status']="User Already Registered";
  $pass['user']=0;

 }


 else
 {

 $query="INSERT INTO store_register(name,store_name,mobile,address,email) VALUES ('$name','$store_name','$mobile','$address','$email')";

 if (mysqli_query($conn, $query))
  {

      $last_id=mysqli_insert_id($conn);
      $set=mysqli_query($conn,"SELECT * FROM store_register WHERE strreg_id='$last_id'");
      $user=mysqli_fetch_assoc($set);

    $pass['Status']="Success";
    $pass['user']=$user;
    
  }
     
  else 
  {
   
   $pass['Status']="Failed"; 
   $pass['user']=0; 
     
  }    

  }


  print_r(json_encode($pass));
 
?>