
<?php
require './../class/myclass.php';
if($_POST)
{
    $date= mysqli_real_escape_string($connection, $_POST['date']);
    $user= mysqli_real_escape_string($connection, $_POST['user']);
    $ven= mysqli_real_escape_string($connection, $_POST['ven']);
    $slot= mysqli_real_escape_string($connection, $_POST['slot']);
    $status= mysqli_real_escape_string($connection, $_POST['status']);
    $price= mysqli_real_escape_string($connection, $_POST['price']);
    
   $query = mysqli_query($connection,"insert into tbl_booking(date,user_id,ven_id,slot_id,status,price)values('{$date}','{$user}','{$ven}','{$slot}','{$status}','{$price}')")or die(mysqli_error($connection));

   if($query)
   {
       echo"<script>alert('Record Inserted')</script>";
   }   
   }

?>

<!DOCTYPE html>

<html lang="en">

<!-- Mirrored from codervent.com/rukada/color-admin/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Dec 2018 12:35:53 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Venue Finder</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
 <!--Start sidebar-wrapper-->
   <?php
   include './../themepart/sidebar.php';
   ?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
 <?php
   include './../themepart/header.php';
   ?>
<!--End topbar header-->
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
	
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
    
  
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->


    <div class="row">         <div class="col-lg-1"></div>
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
               <div class="card-title text-dark"><h4>Booking</h4></div>
           <hr>
            <form method="POST" enctype="multipart/form-data">
        
           <div class="form-group">
            <label for="input-2">Date</label>
            <input type="date" class="form-control" required="true" name="date" id="input-2" placeholder="">
           </div>
         
            <div class="form-group">
            <label for="input-3">User</label>
            
              <?php 
                                     $userq = mysqli_query($connection, "select * from tbl_user") or die(mysqli_error($connection));
                                              
                                              echo "<select name='user' class='form-control'>";
                                              
                                              while($userrow = mysqli_fetch_array($userq))
                                              {
                                                  echo "<option  value='{$userrow['user_id']}'>{$userrow['user_name']}</option>";
                                              }
                                              
                                              echo "</select>";
                                              
                ?> 
           </div>
                  <div class="form-group">
                      <label for="input-3">Venue</label>
                        <?php 
                                              
                                              
                    
                                            $venq = mysqli_query($connection, "select * from tbl_venue_master") or die(mysqli_error($connection));
                                              
                                              echo "<select name='ven'  class='form-control'>";
                                              
                                              while($venrow = mysqli_fetch_array($venq))
                                              {
                                                  echo "<option  value='{$venrow['venue_id']}'>{$venrow['title']}</option>";
                                              }
                                              
                                              echo "</select>";
                                              
                                              ?>
                  </div>
             <div class="form-group">
            <label for="input-3">Slot</label>
            
                      
                                            <?php
                                            $slotq = mysqli_query($connection, "select * from tbl_slot_master") or die(mysqli_error($connection));
                                              
                                              echo "<select name='slot' class='form-control' >";
                                              
                                              while($slotrow = mysqli_fetch_array($slotq))
                                              {
                                                  echo "<option  value='{$slotrow['slot_id']}'>{$slotrow['slot_name']}</option>";
                                              }
                                              
                                              echo "</select>";
                                              
                                              ?> 
             </div>
           <div class="form-group">
            <label for="input-4">Status</label>
            <input type="text" class="form-control" required="true" name="status" id="input-4" placeholder="Enter status">
            </div>
             <div class="form-group">
            <label for="input-4">price</label>
            <input type="text" class="form-control" required="true" name="price" id="input-4" placeholder="Enter price">
            </div>
          <div class="form-group">
          <button type="submit" class="btn btn-gradient-royal shadow-primary px-5">Submit</button>
          <button type="button" class="btn btn-gradient-orange shadow-success px-5"  onclick="window.location='view-booking.php';" name="button">view</button>
         <button type="reset" class="btn btn-gradient-royal shadow-primary px-5">Reset</button>
         </div>
          </form>
         </div>
         </div>
      </div>

      
    </div><!--End Row-->


    <!--End Row-->


		  <!--End Row-->

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	
	<!--End footer-->
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
   <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	
</body>

<!-- Mirrored from codervent.com/rukada/color-admin/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Dec 2018 12:35:53 GMT -->
</html>
