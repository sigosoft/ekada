<?php

include "db/config.php";

$ProductID1=$_GET['id'];


$query="DELETE FROM store_product_stock WHERE StoreStockID='$ProductID1'";

if (mysqli_query($conn, $query))
 {
    echo "<script> alert('Product Deleted Successfully');window.location.href = 'manage_store_product.php';</script>";
 }

else
{

    echo "<script> alert('Error');window.location.href = 'manage_store_product.php';</script>";

}


?>
