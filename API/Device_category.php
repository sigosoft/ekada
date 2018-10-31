<?php 

include 'Device_connection.php';


$StoreID=$_POST['StoreID'];


$query="SELECT DISTINCT store_product_stock.CategoryID, category.Category_Title, category.CategoryImage FROM category INNER JOIN store_product_stock ON store_product_stock.CategoryID=category.Category_Id WHERE store_product_stock.StoreID='$StoreID'";

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $Category[]=$row;

}

}
else
{
   $Category[]="No Category";
}




$output['Category']=$Category;





$pass=$output;


print_r(json_encode($pass));





?>