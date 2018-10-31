<?php

include 'Device_connection.php';

$query="SELECT * from free_delivery ";

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

    {

        while($row=mysqli_fetch_assoc($result))
            {
                $freedelivery[]=$row;
            }

    }
else
    {
        $freedelivery[]="No data";
    }

$output['freedelivery']=$freedelivery;

$pass=$output;

print_r(json_encode($pass));

?>
