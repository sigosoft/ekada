<?php 

include 'Device_connection.php';


$query="select sub_name from sub_locations ";

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