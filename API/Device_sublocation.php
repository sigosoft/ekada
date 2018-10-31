<?php 

include 'Device_connection.php';



$loc_id=$_POST['location_id'];




$query="select * from sub_locations where location_id='$loc_id'";

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $subloc[]=$row;
}

}
else
{
   $subloc[]="No sublocations";
}
$output['sublocation']=$subloc;
$pass=$output;
print_r(json_encode($pass));
?>