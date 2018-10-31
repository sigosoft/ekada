<?php

  include "db/config.php";
  
    $cat_id = $_POST['cat_id'];
    $list = mysqli_query($conn,"SELECT * FROM subcategory WHERE category_id='$cat_id'");
    $data=mysqli_fetch_row($list);
    $string="";
    foreach($list as $data)
    {
        $string= $string."<option value='".$data['subcategory_id']."'>".$data['subcategory_Title']."</option>";
    }
    print_r(json_encode($string));
    
?>