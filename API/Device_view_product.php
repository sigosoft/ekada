<?php 

include 'Device_connection.php';

$prod_name=$_POST['prod_name'];
$prod_id=$_POST['prod_id'];

$query="SELECT ProductImage,ProductImage2 FROM products WHERE ProductName='$prod_name' OR ProductID='$prod_id'";
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