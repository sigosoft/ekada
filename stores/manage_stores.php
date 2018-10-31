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

$sql="SELECT * FROM stores where StoreID='$StoreID'";
$result=mysqli_query($conn,$sql);

if(isset($_POST['submit']))
{
    $storename=$_POST['storename'];
    //$username=$_POST['username'];
    //$password1=$_POST['password'];
   // $password=md5($password1);
    $Sroreid=$_POST['StoreID'];
    
    $query2="UPDATE stores SET StoreName='$storename' WHERE StoreID='$StoreID'";
mysqli_query($conn, $query2);


if (mysqli_query($conn, $query2))
 {
    echo "<script> alert('Edited Successfully');window.location.href = 'manage_stores.php';</script>";
 }

else
{

    echo "<script> alert('Error');window.location.href = 'manage_stores.php';</script>";

}

}

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
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    




 <?php require 'partials/sidebar.php'; ?>




        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Store</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Store List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php while($row=mysqli_fetch_assoc($result))
                      { ?>
                     <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">






                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductName">Store Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                         <input  class="form-control col-md-7 col-xs-12" name="storename"  type="text" id="storename" value="<?php echo $row['StoreName']; ?>">

                        </div>
                      </div>

                      <!--<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product_MRP">User Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="username" class="form-control col-md-7 col-xs-12" name="username"  type="text" value="<?php echo $row['Username']; ?>">

                         <input type="hidden" name="StoreID" id="StoreID" value="<?php echo "$StoreID"; ?>">
                        

                        </div>
                      </div>
                     
                     
                

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="StorePrice"> Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="password" name="password" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12" value="<?php echo $row['Password']; ?>">
                        </div>
                      </div>
                      -->
                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProductMRP">Store Image<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="../uploads/stores/<?php echo $StoreImage; ?>" class="img-thumbnail" width="100%"/><br><br>
                        <a href="store_image.php?id=<?php echo $row['StoreID']; ?>">Edit Image</a><br><br>                      
                      </div>
                    </div>










                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset"  class="btn btn-primary">Cancel</button>
                          <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                      </div>
                    </form>
                    <?php } ?>
                  </div>
                </div>
              </div>



        </div>
        </div>
        </div>
              
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
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>