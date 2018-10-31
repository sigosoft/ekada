<?php


session_start();

/*if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };*/


$current = date('Y-m-d');


include "db/config.php";

$current = date('Y-m-d');

$ProductID=$_GET['id'];

$list=mysqli_query($conn,"SELECT * FROM products WHERE ProductID='$ProductID'");
$row=mysqli_fetch_assoc($list);

$LiveCatID=$row['CategoryID'];



/*$GetCat1=mysqli_query($conn,"SELECT * FROM category WHERE CategoryID='$LiveCatID'");
$list1=mysqli_fetch_assoc($GetCat1);
$LiveCatName=$list1['CategoryName'];*/



include "db/config.php";

if(isset($_POST['submit']))
{



/*$CategoryID            = $_POST['CategoryID'];
      

$ProductName           = $_POST['ProductName'];
$ProductMRP            = $_POST['ProductMRP'];
$ProductStatus         = $_POST['Status'];
$ProductDescription    = $_POST['ProductDescription'];
$DeliveryCharge        =$_POST['DeliveryCharge'];

$validate=mysqli_query($conn,"SELECT * FROM products WHERE ProductName='$ProductName' AND ProductID!='$ProductID'");


if(mysqli_num_rows($validate)<=0)
{


$sql="UPDATE products SET CategoryID='$CategoryID',ProductName='$ProductName', ProductMRP='$ProductMRP', ProductDescription='$ProductDescription', ProductStatus='$ProductStatus',DeliveryCharge='$DeliveryCharge' WHERE ProductID='$ProductID'";*/
$CategoryID            = $_POST['CategoryID'];
$SubCategoryID        =$_POST['SubCategoryID'];


$ProductName           = $_POST['ProductName'];
$ProductMRP            = $_POST['ProductMRP'];
$ProductStatus         = $_POST['Status'];
$ProductDescription    = $_POST['ProductDescription'];
$DeliveryCharge        =$_POST['DeliveryCharge'];
$BrandID               = $_POST['BrandID'];

$GetBrand=mysqli_query($conn,"SELECT * FROM brands WHERE BrandID='$BrandID'");
$GetBrandRow=mysqli_fetch_assoc($GetBrand);
$BrandName=$GetBrandRow['BrandName'];


$PsearchName=$BrandName." ".$ProductName." ".$ProductUnit;

$validate=mysqli_query($conn,"SELECT * FROM products WHERE ProductName='$ProductName' AND ProductID!='$ProductID'");


if(mysqli_num_rows($validate)<=0)
{


$sql="UPDATE products SET CategoryID='$CategoryID',subcategory_id='$SubCategoryID', ProductName='$ProductName', ProductMRP='$ProductMRP', ProductDescription='$ProductDescription',ProductStatus='$ProductStatus',DeliveryCharge='$DeliveryCharge',PsearchName='$PsearchName',BrandID='$BrandID ' WHERE ProductID='$ProductID'";






if (mysqli_query($conn, $sql))
 {

    echo "<script> alert('Products Modified Successfully');window.location.href = 'manage_products.php';</script>";
 }

else
{

    echo "<script> alert('Upload Error');window.location.href = 'manage_products.php';</script>";
}

}

else
{

 echo "<script> alert('Product Already Exist');window.location.href = 'manage_products.php';</script>";

}

};





?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-KADA | Admin</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">




 <?php require 'partials/sidebar.php'; ?>






        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Products</h3>
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" method="POST" action="" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CategoryName"> Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">


<select name="CategoryID" id="CategoryID" class="form-control col-md-7 col-xs-12" >

<?php
$resulter     = mysqli_query($conn,"SELECT * from category WHERE CStatus='Active'");
while ($rower = mysqli_fetch_array($resulter))
{?>
    <option value="<?=$rower['Category_Id']?>" <?php if($row['CategoryID'] ==  $rower['Category_Id']){echo "selected";} ?>><?=$rower['Category_Title']?></option>
<?php }
?>


</select>
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CategoryName"> SubCategory Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">


<select name="SubCategoryID" id="SubCategoryID" class="form-control col-md-7 col-xs-12" >

<?php
$resulter     = mysqli_query($conn,"SELECT * from subcategory ");
while ($rower = mysqli_fetch_array($resulter))
{?>
    <option value="<?=$rower['subcategory_id']?>" <?php if($row['subcategory_id'] ==  $rower['subcategory_id']){echo "selected";} ?>><?=$rower['subcategory_Title']?></option>
<?php }
?>


</select>
                        </div>
                      </div>



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductName"> Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductName" class="form-control col-md-7 col-xs-12" value="<?php echo $row['ProductName']; ?>" name="ProductName" placeholder="ProductName" required="required" type="text">
                        </div>

                      </div>




                    <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductPrice">Product price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductPrice" class="form-control col-md-7 col-xs-12" value="<?php echo $row['ProductPrice']; ?>" name="ProductPrice" placeholder="Product Price" type="text">
                        </div>
                      </div> -->

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductMRP">Product MRP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductMRP" class="form-control col-md-7 col-xs-12" value="<?php echo $row['ProductMRP']; ?>" name="ProductMRP" placeholder="Product MRP" type="text">
                        </div>
                      </div>


                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BrandID"> Brand Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
 
                    <select name="BrandID" id="BrandID" class="form-control col-md-7 col-xs-12" required>
                        
                    <?php 
                    $result = mysqli_query($conn,"SELECT * from brands WHERE BStatus='Active'");
                    while ($rower = mysqli_fetch_array($result))
                    {?>
                    <option value="<?=$rower['BrandID']?>"
                    <?php if($row['BrandID'] ==  $rower['BrandID']){echo "selected";} ?>><?=$rower['BrandName']?></option>
                    <?php }
                    ?>
                        
                    </select> 
                        </div>
                      </div>

                     
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductDescription">Product Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="ProductDescription" class="form-control col-md-7 col-xs-12" name="ProductDescription" placeholder="Product Description" type="text"><?php echo $row['ProductDescription']; ?></textarea>
                        </div>
                        
                      </div>


                   <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"> Status <span class="required">*</span>
                        </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                   <select class="form-control"  name="Status">
                   <option value="<?php echo $row['ProductStatus']; ?>" class="active"><?php echo $row['ProductStatus']; ?></option>

                   <option value="Active">Active</option>
                   <option value="Blocked">Blocked</option>

                   </select>



                    </div>
                    </div>


         <!--     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DeliveryCharge">Delivery Charge<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="DeliveryCharge" class="form-control col-md-7 col-xs-12" value="<?php echo $row['DeliveryCharge']; ?>" name="DeliveryCharge" placeholder="Delivery Charge" type="number">
                        </div>
                      </div>-->


                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductMRP">Product<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="../uploads/product/<?php echo $row['ProductImage']; ?>" class="img-thumbnail" width="100%"/><br><br>
                        <a href="product_image.php?id=<?php echo $row['ProductID']; ?>">Edit Image</a><br><br>                      
                      </div>
                    </div>


               <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductMRP">Product<span class=""></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="../uploads/product/<?php echo $row['ProductImage2']; ?>" class="img-thumbnail" width="100%"/><br><br>
                        <a href="product_image2.php?id=<?php echo $row['ProductID']; ?>">Edit Image</a><br><br>                      
                      </div>
                    </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         <a href="manage_products.php"><button type="button" class="btn btn-primary" >Cancel</button></a>
                          <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                      </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>









          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered By <a href="">E-KADA</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

   <script>
       $('#CategoryID').on('change',function(){
         var cat_id = $("#CategoryID option:selected").val();

         $.ajax({
         method: "POST",
         url: "http://ourworks.co.in/ekada/admin/getSubCategory.php",
         data : { cat_id : cat_id },
         dataType : "json",
         success : function( data ){
           $('#SubCategoryID').html(data);
           console.log(data);
             }
       });
       });
   </script>


  </body>
</html>
