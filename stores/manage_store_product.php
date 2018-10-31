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

$sql="SELECT brands.*, store_product_stock.* FROM store_product_stock INNER JOIN brands ON store_product_stock.BrandID=brands.BrandID WHERE  store_product_stock.StoreID='$StoreID'" ;
$result=mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>E-KADA | STORE</title>
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
                <h3>Products</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manage Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         

                          <th>Product Name</th>
                       
                          <th>Store Price</th>
                          <th>Brand</th>
                         
                          <th>Status</th>
                          <th>Action</th>
                          <th>Status</th>
                      
                          

                        </tr>
                      </thead>


                      <tbody>

                      <?php while($row=mysqli_fetch_assoc($result))
                      {
                        $ProductID=$row['ProductID'];
                        $Getproduct=mysqli_query($conn,"SELECT * FROM products WHERE ProductID='$ProductID'");
                        $Product_row=mysqli_fetch_assoc($Getproduct);
                        $ProductName=$Product_row['ProductName'];
                       
                      ?>
                        
                        <tr>
                          
                        
                          <td><?php echo $ProductName; ?></td>
                          <td><?php echo $row['StorePrice']; ?></td>
                          <td><?php echo $row['BrandName']; ?></td>
                          <td><?php echo $row['StorePStatus']; ?></td>


                      
                          
                          <td><a href="edit_store_product.php?id=<?php echo $row['StoreStockID'];?>">Edit</a>   |   
                          
                      <a href="delete_store_product.php?id=<?php echo $row['StoreStockID'];?>">Delete</a></td>

                          
                        
                          <td><a href="active_store_product.php?id=<?php echo $row['StoreStockID'];?>">Active</a>   |   
                          
                      <a href="block_store_product.php?id=<?php echo $row['StoreStockID'];?>">Block</a></td>
                          
                      
                           
                      
                        </tr>

                       <?php }; ?> 
                      
                      </tbody>
                    </table>
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