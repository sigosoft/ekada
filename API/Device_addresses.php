<?php 

include 'Device_connection.php';

$UserID=$_POST['UserID'];

$query="SELECT * FROM saved_address_table WHERE UserID='$UserID'";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $order_items[]=$row;

}

}
else
{
   $order_items[]="No Data";
}




$output['order_items']=$order_items;





$pass=$output;


print_r(json_encode($pass));





?>