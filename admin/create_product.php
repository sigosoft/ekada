<?php


session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };


$current = date('Y-m-d');


include "db/config.php";




if(isset($_POST['submit']))
{


$SubCategory_Id        =$_POST['SubCategory_Id'];

$CategoryID            = $_POST['CategoryID'];

$ProductName           = $_POST['ProductName'];
$ProductPrice          = $_POST['ProductPrice'];
$ProductMRP            = $_POST['ProductMRP'];
$BrandID               = $_POST['BrandID'];
$ProductUnit           = $_POST['ProductUnit'];
$ProductDescription    =$_POST['ProductDescription'];
//$DeliveryCharge        =$_POST['DeliveryCharge'];
$gst                   =$_POST['gst'];



$GetBrand=mysqli_query($conn,"SELECT * FROM brands WHERE BrandID='$BrandID'");
$GetBrandRow=mysqli_fetch_assoc($GetBrand);
$BrandName=$GetBrandRow['BrandName'];



$PsearchName=$BrandName." ".$ProductName." ".$ProductUnit;



$validate=mysqli_query($conn,"SELECT * FROM products WHERE ProductName='$ProductName' AND BrandID='$BrandID' AND ProductUnit='$ProductUnit'");


if(mysqli_num_rows($validate)<=0)
{


$target_dir = "../uploads/product/"; //directory details
    
    $imageFileType = pathinfo($_FILES["ProductImage"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)
    $target=$target_dir.time().'.'.$imageFileType;
    $ProductImage = time().'.'.$imageFileType; //full path
    
     $target_dir1 = "../uploads/product/"; 
    $imageFileType1 = pathinfo($_FILES["ProductImage1"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)
    $target1=$target_dir1.time().'1'.'.'.$imageFileType1;
    $ProductImage2 = time().'1'.'.'.$imageFileType1; //full path
   
    if(move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target) &&  move_uploaded_file($_FILES["ProductImage1"]["tmp_name"], $target1))

    {

$sql="INSERT INTO products(ProductName, ProductMRP,gst, ProductUnit, ProductDescription, CategoryID, subcategory_id, BrandID, ProductStock, PsearchName, ProductStatus, ProductImage, ProductImage2) VALUES ('$ProductName', '$ProductMRP','$gst', '$ProductUnit', '$ProductDescription', '$CategoryID ', '$SubCategory_Id', '$BrandID ',  0, '$PsearchName',  'Active', '$ProductImage','$ProductImage2')";


if (mysqli_query($conn, $sql))
 {

    echo "<script> alert('Products Added Successfully');window.location.href = 'manage_products.php';</script>";
 } 

else 
{
  
    echo "<script> alert('Error');window.location.href = 'create_product.php';</script>";
}

}

else
{

echo "<script> alert('Upload Error');window.location.href = 'create_product.php';</script>";

}

}

else
{

 echo "<script> alert('Product Already Exist');window.location.href = 'create_product.php';</script>";

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
    
    <title>E-KADA | ADMIN</title>

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
                <h3>Add Products</h3>
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
                    <form id="demo-form2" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CategoryID"> Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
 
<select name="CategoryID" id="CategoryID" class="form-control col-md-7 col-xs-12" required>
    <option value="">Select Category</option> 
<?php 
$result = mysqli_query($conn,"SELECT * from category WHERE CStatus='Active'");
while ($row = mysqli_fetch_array($result))
{
    echo "<option value=".$row['Category_Id'].">".$row['Category_Title']."</option>";
}
?>        
</select> 
                        </div>
                      </div>
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CategoryID"> SubCategory Name <span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
 
<select name="SubCategory_Id" id="SubCategory_Id" class="form-control col-md-7 col-xs-12" >
    <option value="">Select SubCategory</option> 
<?php 
$result = mysqli_query($conn,"SELECT * from subcategory ");
while ($row = mysqli_fetch_array($result))
{
    echo "<option value=".$row['subcategory_id'].">".$row['subcategory_Title']."</option>";
}
?>        
</select> 
                        </div>
                      </div>
                      
                      
                                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BrandID"> Brand Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
 
<select name="BrandID" id="BrandID" class="form-control col-md-7 col-xs-12" required>
    <option value="">Select Brand</option> 
<?php 
$result = mysqli_query($conn,"SELECT * from brands WHERE BStatus='Active'");
while ($row = mysqli_fetch_array($result))
{
    echo "<option value=".$row['BrandID'].">".$row['BrandName']."</option>";
}
?>        
</select> 
                        </div>
                      </div>



           
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductName"> Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductName" class="form-control col-md-7 col-xs-12" name="ProductName" placeholder="ProductName" required="required" type="text">
                        </div>
                      
                      </div>

                      
                  

                     
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductMRP">Product MRP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductMRP" class="form-control col-md-7 col-xs-12" name="ProductMRP" placeholder="Product MRP" type="number">
                        </div>
                      </div>
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gst">GST<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                              <input type="radio" name="gst"
                            <?php if (isset($gst) && $gst=="0") echo "checked";?>
                              value="0">0% &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              
                              <input type="radio" name="gst"
                              <?php if (isset($gst) && $gst=="5") echo "checked";?>
                              value="5">5% &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              
                              <input type="radio" name="gst"
                              <?php if (isset($gst) && $gst=="12") echo "checked";?>
                              value="12">12% &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              
                              <input type="radio" name="gst"
                              <?php if (isset($gst) && $gst=="18") echo "checked";?>
                              value="18">18%  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <input type="radio" name="gst"
                              <?php if (isset($gst) && $gst=="28") echo "checked";?>
                              value="28">28% &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                        </div>
                      </div>
                      
                        
                      
                      
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductUnit">Product Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductUnit" class="form-control col-md-7 col-xs-12" name="ProductUnit" placeholder="Product Unit" type="text">
                        </div>
                      </div>


            <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductDescription">Product Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="ProductDescription" class="form-control col-md-7 col-xs-12" name="ProductDescription" placeholder="Product Description" type="text"></textarea>
                        </div>
                      </div>
                      
                      
                      
                     <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DeliveryCharge">Delivery charge<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="DeliveryCharge" class="form-control col-md-7 col-xs-12" name="DeliveryCharge" placeholder="Delivery Charge" type="text">
                        </div>
                      </div>-->
                      
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductImage">Product Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductImage" class="form-control col-md-7 col-xs-12" name="ProductImage" placeholder="Product Image" type="file">
                        </div>
                      </div>
   
                    
                      
                   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductImage">Product Image<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductImage1" class="form-control col-md-7 col-xs-12" name="ProductImage1" placeholder="Product Image" type="file">
                        </div>
                      </div>
                     
 

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="create_product.php"><button type="button" class="btn btn-primary">Cancel</button></a> 
                          
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
           $('#SubCategory_Id').html(data);
           console.log(data);
             }
       });
       });
   </script>
  
  </body>
</html>
