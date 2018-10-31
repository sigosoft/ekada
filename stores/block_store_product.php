<?php

include "db/config.php";

$ProductID1=$_GET['id'];


$query="UPDATE store_product_stock set status='0', StorePStatus='Blocked' WHERE StoreStockID='$ProductID1'";

if (mysqli_query($conn, $query))
 {
    echo "<script> alert('Product Blocked Successfully');window.location.href = 'manage_store_product.php';</script>";
 }

else
{

    echo "<script> alert('Error');window.location.href = 'manage_store_product.php';</script>";

}


?>
