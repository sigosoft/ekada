<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };






require 'db/config.php';
$date=date('Y-m-d');

$sql="SELECT * FROM app_orders WHERE status='Delivered' ORDER BY OrderID ASC";
$result=mysqli_query($conn,$sql);

if(isset($_POST['submit']))
{

$date1=$_POST['date'];

$sql1="SELECT * FROM app_orders WHERE status='Delivered'  AND date='$date1'";
$result=mysqli_query($conn,$sql1);

}
 else{
     
  
$sql="SELECT * FROM app_orders WHERE status='Delivered'   AND date='$date'";
$result=mysqli_query($conn,$sql);


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
                <h3>Total Sale</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Total Sale</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                      <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">      
                   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date<span class=""></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="date" id="date" name="date" placeholder="date" class="form-control col-md-3 col-xs-12">
                        </div>
                         <input type="submit" name="submit" class="btn btn-success" value="Submit">
                      </div>
                      
                  </form>   
                      
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Store Name</th>
                          <th>Order No</th>
                          <th>Invoice No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Grand Total</th>
                          <th>Status</th>
                          <th>Order View</th>
                      

                        </tr>
                      </thead>


                      <tbody>

                      <?php while($row=mysqli_fetch_assoc($result))
                      {
                      $StoreID=$row['StoreID'];
                        $GetStore=mysqli_query($conn,"SELECT * FROM stores WHERE StoreID='$StoreID'");
                        $GetStorerow=mysqli_fetch_assoc($GetStore);
                        $StoreName=$GetStorerow['StoreName'];

                      ?>
                        
                        <tr>
                           <td><?php echo $StoreName; ?></td>
                           <td><?php echo $row['OrderNO']; ?></td>
                           <td><?php echo $row['InvoiceNO']; ?></td>
                       
                          <td><?php echo $row['BillingDet_Name']; ?></td>
                          <td><?php echo $row['BillingDet_Email']; ?></td>
                          <td><?php echo $row['BillingDet_Phone']; ?></td>
                          <td><?php echo $row['GrandTotal']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                             
                             <?php 
                           
                           
                             $total += $row['GrandTotal'];
                           
                           ?>
                        
                        
                           <td><a href="view_orders.php?id=<?php echo $row['OrderID'];?>">View</a></td>  
                           
                        </tr>

                       <?php }; ?> 
                      
                      </tbody>
                    </table>
                    <div class="p-0 col-md-2 col-sm-12 col-xs-12">
                        <label>Total</label>
                  <input class="form-control " name="Total" placeholder="" type="text" id="Total" value="<?php echo $total; ?>">
                  </div>

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

   <script>

function updater(OrderID)
{
  

 document.getElementById('OrderID').value = OrderID;



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