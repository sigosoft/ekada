
<?php

include 'Device_connection.php';

$StoreID=$_POST['StoreID'];

$AddressSave=$_POST['AddressSave'];


$BillingDet_Phone=$_POST['BillingDet_Phone'];
$BillingDet_Name=$_POST['BillingDet_Name'];
//$BillingDet_Land=$_POST['BillingDet_Land'];
//$BillingDet_City=$_POST['BillingDet_City'];
$BillingDet_State=$_POST['BillingDet_State'];
$BillingDet_PIN=$_POST['BillingDet_PIN'];
$BillingDet_Address=$_POST['BillingDet_Address'];

$BillingDet_Email=$_POST['Register_Email'];

$BillingDet_UserId=$_POST['BillingDet_UserId'];
$BillingDet_deliverytime=$_POST['BillingDet_Deliverytime'];

$UserType="User";


$GrandTotal=$_POST['GrandTotal'];
$delivery_cahrge=$_POST['DeliveryCharge'];
$location=$_POST['location'];
$sub_location=$_POST['sub_location'];
$landmark=$_POST['landmark'];

$CartData=$_POST['CartData'];


$OrderNO='APP'.time();
$InvoiceNO='A'.time();

$date=date('Y-m-d');

$query="INSERT INTO app_orders(OrderNO, InvoiceNO, GrandTotal, BillingDet_UserId, UserType, BillingDet_Name, BillingDet_Email, BillingDet_Phone, BillingDet_Land, BillingDet_State, BillingDet_PIN, BillingDet_Address, status, StoreID,deliverytime,delivery_charge,location,date,sub_location) VALUES ('$OrderNO', '$InvoiceNO', '$GrandTotal', '$BillingDet_UserId', '$UserType', '$BillingDet_Name', '$BillingDet_Email', '$BillingDet_Phone', '$landmark', '$BillingDet_State', '$BillingDet_PIN', '$BillingDet_Address', 'Order Placed','$StoreID','$BillingDet_deliverytime','$delivery_cahrge','$location','$date','$sub_location')";

if(mysqli_query($conn,$query))
{

  
 $OrderID=mysqli_insert_id($conn);

 if($AddressSave==1)
 {

 $save_address=mysqli_query($conn,"INSERT INTO address_table(BillingDet_Name, BillingDet_Email, BillingDet_Phone, BillingDet_Land, BillingDet_City, BillingDet_State, BillingDet_PIN, BillingDet_Address, BillingDet_UserId) VALUES ('$BillingDet_Name', '$BillingDet_Email', '$BillingDet_Phone', '$BillingDet_Land', '$BillingDet_City', '$BillingDet_State', '$BillingDet_PIN', '$BillingDet_Address', '$BillingDet_UserId')");





};

 $json = json_decode($CartData, true);

$elementCount  = count($json);





for ($i=0;$i < $elementCount; $i++) 
 {
 

    $ProductName=$json[$i]['ProductName'];
    $Product_Id=$json[$i]['Product_Id'];


    $Quantity=$json[$i]['Quantity'];
    $Product_MRP=$json[$i]['Product_MRP'];
    //$Total=$json[$i]['Total'];
    $gst_percentage=$json[$i]['gst_percentage'];
    $gst_value=$json[$i]['gst_value'];
    $sub_total=$json[$i]['sub_total'];
    $store_id=$json[$i]['store_id'];

    $GetDet="SELECT * FROM products WHERE ProductID='$Product_Id'";

    $GetImage=mysqli_query($conn,$GetDet);
    $GetImage_row=mysqli_fetch_assoc($GetImage);



    $ProductImage=$GetImage_row['ProductImage'];
    $PsearchName=$GetImage_row['PsearchName'];




  

 $sql=mysqli_query($conn,"INSERT INTO app_order_items(OrderID, ProductID, ProductName, ProductImage, Quantity, ProductPrice, OrderNo, InvoiceNO,gst_percentage,gst_value,sub_total,store_id) VALUES ('$OrderID', '$Product_Id', '$PsearchName', '$ProductImage', '$Quantity', '$Product_MRP', '$OrderNO', '$InvoiceNO','$gst_percentage','$gst_value','$sub_total','$store_id')");

 $stock=mysqli_query($conn,"UPDATE product SET Product_Stock=Product_Stock-'$Quantity' WHERE Product_Id='$Product_Id'");


 }

$pass['Status']="Success";


}
else
{

$pass['Status']="Failed";

}



print_r(json_encode($pass));



?>