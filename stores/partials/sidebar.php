    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-shopping-bag"></i> <span> E-Kada</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../uploads/stores/<?php echo $StoreImage; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>E-Kada</span>
                <h2><?php echo $StoreName; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> Dashboard </a>
                    
                  </li>


                   


            <li><a href="live_orders.php"><i class="fa fa-shopping-cart"></i> Live Orders</a>

                 <li><a href="Delivered_order.php"><i class="fa fa-truck"></i> Delivered Orders</a>

                <li><a href="cancelled_orders.php"><i class="fa fa-cart-arrow-down"></i> Cancelled Orders</a>
                 
               
                  <li><a><i class="fa fa-shopping-cart"></i>Store Product<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_store_product.php">Create Product</a></li>
                      <li><a href="manage_store_product.php">Manage Product</a></li>
                      
                    </ul>
                  </li>

                  <li><a href="add_product_stock.php"><i class="fa fa-truck"></i> Add Stock </a>
                    
                  </li>

            <!--      <li><a href="product_list.php"><i class="fa fa-product-hunt"></i> E KADA Products </a>
                    
                  </li>-->

              


                   <li><a><i class="fa fa-clock-o"></i>Product Requests<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="product_request.php">Create Request</a></li>
                      <li><a href="my_requests.php">My Requests</a></li>
                      
                    </ul>
                  </li>
                  
             <!--      <li><a><i class="fa fa-clock-o"></i>Delivery Charge<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_deliverycharge.php">Add Delivery Charge</a></li>
                      <li><a href="manage_deliverycharge.php">Manage Delivery Charge</a></li>
                      
                    </ul>
                  </li>-->

                   <li><a href="sales_report.php"><i class="fa fa-pie-chart"></i> Sales Report</a></li>
                   <li><a href="manage_stores.php"><i class="fa fa-pie-chart"></i> Manage Stores</a>
                     <li><a href="totalsale.php"><i class="fa fa-pie-chart"></i> Todays Sale</a>
                

              


                 

                </ul>
              </div>
        

            </div>
            <!-- /sidebar menu -->

     
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>

              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">

                <li class="">
                  <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../uploads/stores/<?php echo $StoreImage; ?>" alt=""><?php echo $Keyperson; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li>
                      <a href="password_change.php">
                        
                        <span>Change Password</span>
                      </a>
                    </li>
                 
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              
              </ul>
            </nav>
          </div>
        </div>