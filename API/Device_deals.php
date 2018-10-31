<?php 

include 'Device_connection.php';



$query="SELECT todays_deal.*, product.* FROM todays_deal INNER JOIN product ON todays_deal.TodaysDeal_ProductId=product.Product_Id";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $Deals[]=$row;

}

}
else
{
   $Deals[]="No Brands";
}




$output['Deals']=$Deals;





$pass=$output;


print_r(json_encode($pass));





?>