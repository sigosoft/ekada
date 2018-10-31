<?php

include 'Device_connection.php';

$Mode=$_POST['Mode'];
$AddressID=$_POST['AddressID'];
$UserID=$_POST['UserID'];

if($Mode=='DefaultAddress')
{

$query="UPDATE address_table SET DefaultAddress=1 WHERE address_id='$AddressID'";
if(mysqli_query($conn,$query))
{



$pass['Status']="Success";

$updater="UPDATE address_table SET DefaultAddress=0 WHERE address_id!='$AddressID' AND BillingDet_UserId='$UserID'";

mysqli_query($conn,$updater);




}
else
{

$pass['Status']="Failed";

}

}
else if($Mode=='Delete')
{

$query="DELETE FROM address_table WHERE address_id='$AddressID'";
if(mysqli_query($conn,$query))
{

$pass['Status']="Success";

}
else
{


$pass['Status']="Failed";

	
}

}

print_r(json_encode($pass));

?>