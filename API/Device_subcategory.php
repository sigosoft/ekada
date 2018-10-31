<?php 

include 'Device_connection.php';



$category_id=$_POST['category_id'];


//$query="SELECT DISTINCT store_product_stock.CategoryID, category.Category_Title, category.CategoryImage FROM category INNER JOIN store_product_stock ON store_product_stock.CategoryID=category.Category_Id WHERE store_product_stock.StoreID='$StoreID'";

$query="select * from subcategory where category_id='$category_id'";

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $subCategory[]=$row;
}

}
else
{
   $subCategory[]="No SubCategory";
}
$output['subCategory']=$subCategory;
$pass=$output;
print_r(json_encode($pass));
?>