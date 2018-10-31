<?php 

include 'Device_connection.php';



$query="SELECT * from app_alert";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $data[]=$row;

}

}
else
{
   $data[]="No data";
}




$output['data']=$data;





$pass=$output;


print_r(json_encode($pass));





?>