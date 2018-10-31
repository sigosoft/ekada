<?php 

include 'Device_connection.php';

$UserID=$_POST['UserID'];
//$UserID = 1;


//$login=mysqli_query($conn,"SELECT Register_Id, Register_Name, Register_Code, Register_Phone, Register_Email, Register_Status, Login_via, SocialLogin_Id, SocialLogin_Name  FROM verifed_register WHERE Register_Id='$UserID'");
$login=mysqli_query($conn,"select * from users where user_id='$UserID'");
if(mysqli_num_rows($login)==1)
{

$row=mysqli_fetch_assoc($login);


$pass['Details']=$row;
  

}

else
{

$pass['Details']="No Data";
 
}



print_r(json_encode($pass));



?>