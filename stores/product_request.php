<?php


session_start();

if(!isset($_SESSION['store']))
 {
   header('location:index.php');
 };

$Store=$_SESSION['store'];
$StoreName=$Store['StoreName'];
$Keyperson=$Store['Keyperson'];
$StoreImage=$Store['StoreImage'];
$StoreID=$Store['StoreID'];

$current = date('Y-m-d');


include "db/config.php";




if(isset($_POST['submit']))
{



$CategoryName = $_POST['CategoryName'];

$ProductName = $_POST['ProductName'];

$ProductMRP = $_POST['ProductMRP'];
$BrandName = $_POST['BrandName'];
$ProductUnit = $_POST['ProductUnit'];



$sql="INSERT INTO product_request(ProductName, BrandName, CategoryName, ProductUnit, ProductMRP, RequestStatus,store_id) VALUES ('$ProductName', '$BrandName', '$CategoryName', '$ProductUnit ', '$ProductMRP','Pending','$StoreID')";

if (mysqli_query($conn, $sql))
 {

    echo "<script> alert('Request Sent Successfully');window.location.href = 'my_requests.php';</script>";
 } 

else 
{

    echo "<script> alert('Error');window.location.href = 'product_requests.php';</script>";
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
    
    <title>EKADA | ADMIN</title>

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
                <h3> Products Request</h3>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CategoryName"> Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                         <select class="form-control col-md-7 col-xs-12" name="CategoryName" required="required">
                             <?php
                             $query="SELECT * FROM category";
                             $result=mysqli_query($conn,$query);
                             foreach($result as $r ){
                             ?>

                             <option value="<?php echo $r['Category_Title']; ?>"><?php echo $r['Category_Title']; ?></option>
                             <?php } ?>
                         </select>
                                            
                       <!-- <input id="CategoryName" class="form-control col-md-7 col-xs-12" name="CategoryName" placeholder="Category Name" required="required" type="text">-->
                        </div>
                      </div>
                      
                      
                                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BrandName"> Brand Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control col-md-7 col-xs-12" name="BrandName" required="required">
                             <?php
                             $query="SELECT * FROM brands";
                             $result=mysqli_query($conn,$query);
                             foreach($result as $r ){
                             ?>

                             <option value="<?php echo $r['BrandName']; ?>"><?php echo $r['BrandName']; ?></option>
                             <?php } ?>
                         </select>               
                        <!--<input id="BrandName" class="form-control col-md-7 col-xs-12" name="BrandName" placeholder="Brand Name" required="required" type="text">-->
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductUnit">Product Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ProductUnit" class="form-control col-md-7 col-xs-12" name="ProductUnit" placeholder="Product Unit" type="text">
                        </div>
                      </div>
                      
                
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="product_request.php"><button type="button" class="btn btn-primary">Cancel</button></a> 
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
            Powered By <a href="">Farmroot</a>
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
  
  </body>
</html>
