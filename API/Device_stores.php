<?php 

include 'Device_connection.php';



$query="SELECT StoreName, StoreImage, StoreID FROM stores WHERE StoreStatus='Active' order by special desc, featured desc";

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $Stores[]=$row;

}

}
else
{
   $Stores[]="No Stores";
}




$output['Stores']=$Stores;





$pass=$output;


print_r(json_encode($pass));





?>