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


require 'db/config.php';

$sql="SELECT brands.*, store_product_stock.* FROM store_product_stock INNER JOIN brands ON store_product_stock.BrandID=brands.BrandID";
$result=mysqli_query($conn,$sql);




if(isset($_POST['submit']))
{

  $new_stock=$_POST['new_stock'];
  $StoreStockID=$_POST['stock_id'];
  $new=mysqli_query($conn, "UPDATE store_product_stock SET Stock=Stock+'$new_stock' WHERE StoreStockID='$StoreStockID'");

  echo "<script> alert('Stock Added Successfully');window.location.href = 'add_product_stock.php';</script>";

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
                <h3>Stock</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Stock Details</h2>
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
                          <th>Brand Name</th>
                          <th>Status</th>
                          <th>Stock</th>
                   
                          <th>Action</th>

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
                           <td><?php echo $row['BrandName']; ?></td>
                           <td><?php echo $row['StorePStatus']; ?></td>
                           <td><?php echo $row['Stock']; ?></td>
                         
                        
                           <td><button data-toggle="modal" data-target="#my-ticket-1" onclick="yourFunction('<?php echo $row['StoreStockID']; ?>','<?php echo $row['Stock']; ?>')" style="cursor: pointer;" id="send" type="submit" class="btn btn-success" name="submit">Add Stock</button></td>  
                      
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

        <div class="modal fade" id="my-ticket-1" tabindex="-1">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Stock</h4>
                  </div>
                  <div class="modal-body">
                  <div class="form-group clearfix">
                   <form method="POST">
                   <div class="container">

                      
                      <label>Current Stock</label>  
                      <input type="number" id="stock" class="form-control" readonly><br>
                      <label>New Stock</label>  
                      <input type="number" name="new_stock" class="form-control"><br>
                      <input type="hidden" id="stock_id" name="stock_id" class="form-control"><br>
                      <input type="submit" id="add_stock" name="submit" class="btn btn-success" value="Submit">

                   </div>
            
         
           
                   </form>
                   </div>
                   </div>
    
              
      
      </div>
    </div>
    </div>




<script>


  
    function yourFunction(intValue,tid){

    document.getElementById('stock').value = tid;
    document.getElementById('stock_id').value = intValue;
    
    }

</script>





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