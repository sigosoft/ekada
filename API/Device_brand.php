<?php 

include 'Device_connection.php';

$StoreID=$_POST['StoreID'];

$query="SELECT DISTINCT store_product_stock.BrandID, brands.BrandName, brands.BrandImage FROM brands INNER JOIN store_product_stock ON store_product_stock.BrandID=brands.BrandID WHERE store_product_stock.StoreID='$StoreID'";

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $Brand[]=$row;

}

}
else
{
   $Brand[]="No Brands";
}




$output['Brand']=$Brand;





$pass=$output;


print_r(json_encode($pass));





?>