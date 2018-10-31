<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };






require 'db/config.php';

$sql="SELECT * FROM app_orders WHERE status='Delivered' ORDER BY OrderID ASC";
$result=mysqli_query($conn,$sql);


$GetTotaled="SELECT(SELECT SUM(GrandTotal) FROM app_orders WHERE status='Delivered') AS Total";

$GetTotal=mysqli_query($conn,$GetTotaled);

$GetRow=mysqli_fetch_assoc($GetTotal);
$TotalE=$GetRow['Total'];


if($TotalE==0)
{
 
 $Total=0;

}
else
{

 $Total=$TotalE;

}


if(isset($_POST['submit']))
{

$From = $_POST['From'];
$To = $_POST['To'];

$sql="SELECT * FROM app_orders WHERE status='Delivered' AND (DATE(Timestamp) >= '$From' AND DATE(Timestamp) <= '$To')";


$result=mysqli_query($conn,$sql);

$GetTotaled="SELECT(SELECT SUM(GrandTotal) FROM app_orders WHERE status='Delivered' AND (DATE(Timestamp) >= '$From' AND DATE(Timestamp) <= '$To')) AS Total";



$GetTotal=mysqli_query($conn,$GetTotaled);
$GetRow=mysqli_fetch_assoc($GetTotal);
$TotalE=$GetRow['Total'];


if($TotalE==0)
{
 
 $Total=0;

}
else
{

 $Total=$TotalE;

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
      
          
            <div class="text-center" >
                <h3>Sales Report</h3>

            
                   <div class="row">
                 <form method="POST">
                 <div class="col-md-6" style="padding-top: 2%;">
                <div class="col-md-5">
                  
                   <label for="from">From</label><input type="date" name="From" class="form-control"> 
               </div>
              <div class="col-md-5">
                  <label for="from">To</label><input type="date" name="To" class="form-control"> 
              </div>
             <div class="col-md-2">
              <button class="btn btn-success" type="submit" name="submit" style="margin-top: 23px">Submit</button>
             </div>

              <div class="col-md-2"> 
           
              </div> 
              </div> 
              </form>
            </div><br>
            <div class="row">
  
 
                   </div> 
                   <div class=" col-md-4 ">
                    <div class="tile-stats">
                     <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                      <div class="count">Total</div>
                        <h3><?php echo $Total; ?></h3>
                       
                     </div>
                   </div> 
</div> 

                    <div class="clearfix"></div>
              
                  <div class="x_content">
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Order No</th>
                          <th>Invoice No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Grand Total</th>
                      
                        
                      

                        </tr>
                      </thead>


                      <tbody>

                      <?php while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                        
                        <tr>
                           <td><?php echo $row['OrderNO']; ?></td>
                           <td><?php echo $row['InvoiceNO']; ?></td>
                       
                          <td><?php echo $row['BillingDet_Name']; ?></td>
                          <td><?php echo $row['BillingDet_Email']; ?></td>
                          <td><?php echo $row['BillingDet_Phone']; ?></td>
                          <td><?php echo $row['GrandTotal']; ?></td>
                       
                           
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