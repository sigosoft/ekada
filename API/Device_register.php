<?php

 include 'Device_connection.php';

 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=md5($_POST['password']);
 $phone=$_POST['mobile'];

 $validate=mysqli_query($conn,"SELECT * FROM users WHERE  phone='$phone'");
 
 if(mysqli_num_rows($validate)>0)
 {

  $pass['Status']="User Already Registered";
  $pass['user']=0;

 }


 else
 {

 $query="INSERT INTO users(name,email,phone,password,image) VALUES ('$name','$email','$phone','$password','dummy.png')";

 if (mysqli_query($conn, $query))
  {

      $last_id=mysqli_insert_id($conn);
      $set=mysqli_query($conn,"SELECT * FROM users WHERE user_id='$last_id'");
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