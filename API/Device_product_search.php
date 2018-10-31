<?php

include 'Device_connection.php';
$key = $_POST['key'];
$store = $_POST['store'];

//$sql="SELECT * FROM store_product_stock WHERE StoreID='$store' AND PsearchName LIKE '%$key%'";
$sql="select store_product_stock.*,products.* from products inner join store_product_stock on store_product_stock.ProductID=products.ProductID WHERE store_product_stock.StoreID='$store' AND products.ProductName LIKE '$key%'";
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
