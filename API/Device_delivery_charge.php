<?php

include 'Device_connection.php';


$total=$_POST['Total'];


$query="SELECT del_charge from delivery_charge where price_rangefrom <='$total' AND '$total'<=price_rangeto";


$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $deliverycharge[]=$row;
}

}
else
{
  
   $deliverycharge[del_charge]="0";
}

$output['deliverycharge']=$deliverycharge;

$pass=$output;

print_r(json_encode($pass));





?>
