<?php 

include 'Device_connection.php';

$Key=$_POST['Key'];

$StoreID=$_POST['StoreID'];


if($Key=='Brand')
{

$BrandID=$_POST['BrandID'];

$query="SELECT products.*, store_product_stock.*,brands.* FROM products INNER JOIN brands ON products.BrandID=brands.BrandID INNER JOIN store_product_stock ON store_product_stock.ProductID=products.ProductID  WHERE store_product_stock.BrandID='$BrandID' AND store_product_stock.StoreID='$StoreID' order by products.ProductName asc ";



$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $Product[]=$row;

}

}
else
{
   $Product[]="No Products";
}




$output['Product']=$Product;





$pass=$output;




}
elseif($Key=='Category')
{
$sub_id=$_POST['sub_category_id'];
$CategoryID=$_POST['CategoryID'];

if($sub_id != ""){
    $query="SELECT products.*, store_product_stock.*,subcategory.*,brands.* FROM products INNER JOIN subcategory ON products.subcategory_id=subcategory.subcategory_id INNER JOIN brands ON products.BrandID=brands.BrandID  INNER JOIN store_product_stock ON store_product_stock.ProductID=products.ProductID WHERE store_product_stock.CategoryID='$CategoryID' AND store_product_stock.StoreID='$StoreID' AND store_product_stock.StorePStatus='Active' AND products.ProductStatus='Active' AND products.subcategory_id='$sub_id' order by products.ProductName asc";
    
}
else{
    $query="SELECT products.*, store_product_stock.*,brands.* FROM products  INNER JOIN brands ON products.BrandID=brands.BrandID  INNER JOIN store_product_stock ON store_product_stock.ProductID=products.ProductID WHERE store_product_stock.CategoryID='$CategoryID' AND store_product_stock.StoreID='$StoreID' AND store_product_stock.StorePStatus='Active' AND products.ProductStatus='Active' order by products.ProductName asc ";
}

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $Product[]=$row;

}

}
else
{
   $Product[]="No Products";
}

$output['Product']=$Product;

$pass=$output;

};

print_r(json_encode($pass));

?>