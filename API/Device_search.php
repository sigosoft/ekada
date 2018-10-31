<?php

include 'Device_connection.php';
$key = $_POST['key'];
$store_id = $_POST['store_id'];


//$sql="SELECT * FROM products WHERE ProductName LIKE '%$key%'";
$sql="SELECT products.*,store_product_stock.*,brands.* FROM products INNER JOIN brands ON brands.BrandID=products.BrandID INNER JOIN store_product_stock ON products.ProductID=store_product_stock.ProductID Where products.ProductName='$key' AND store_product_stock.StoreID='$store_id'";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{
    $pass[]=$row;
}


}
else
{
   $pass[]="no data";
}

$output['pass']=$pass;

$pass=$output;


print_r(json_encode($pass));


?>
