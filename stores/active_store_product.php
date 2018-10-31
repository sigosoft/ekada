<?php

include "db/config.php";

$ProductID1=$_GET['id'];


$query="UPDATE store_product_stock set status='1', StorePStatus='Active'  WHERE StoreStockID='$ProductID1'";

if (mysqli_query($conn, $query))
 {
    echo "<script> alert('Product Activated Successfully');window.location.href = 'manage_store_product.php';</script>";
 }

else
{

    echo "<script> alert('Error');window.location.href = 'manage_store_product.php';</script>";

}


?>
