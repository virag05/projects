<?php
require './../class/myclass.php';
    if($_POST)
{
    $title= mysqli_real_escape_string($connection, $_POST['title']);
    $details= mysqli_real_escape_string($connection, $_POST['details']);
    $capacity= mysqli_real_escape_string($connection, $_POST['capacity']);
    $cat= mysqli_real_escape_string($connection, $_POST['cat']);
  
       $source = $_FILES['logo']['tmp_name'];
  $destination = "upload/".$_FILES['logo']['name'];
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $website= mysqli_real_escape_string($connection, $_POST['website']);
    $contact_no= mysqli_real_escape_string($connection, $_POST['contact_no']);
    $addr= mysqli_real_escape_string($connection, $_POST['addr']);
    $area= mysqli_real_escape_string($connection, $_POST['area']);
    $pname= mysqli_real_escape_string($connection, $_POST['pname']);
    $parking= mysqli_real_escape_string($connection, $_POST['parking']);
    
    $open= mysqli_real_escape_string($connection, $_POST['open']);

    $wifi= mysqli_real_escape_string($connection, $_POST['wifi']);
  
    $longtitude= mysqli_real_escape_string($connection, $_POST['longtitude']);
    $latitude= mysqli_real_escape_string($connection, $_POST['latitude']);
    $minamount= mysqli_real_escape_string($connection, $_POST['minamount']);
    $apxamount= mysqli_real_escape_string($connection, $_POST['apxamount']);
    
    
   $query = mysqli_query($connection,"insert into tbl_venue_master(title,details,capacity,cat_id,logo,email,website,contact_no,address,area_id,person_name,is_parking,is_open,is_wifi,longtitude,latitude,minamount,apxamount)values('{$title}','{$details}','{$capacity}','{$cat}','{$destination}','{$email}','{$website}','{$contact_no}','{$addr}','{$area}','{$pname}','{$parking}','{$open}','{$wifi}','{$longtitude}','{$latitude}','{$minamount}','{$apxamount}')")or die(mysqli_error($connection));
  if($query)
   {
       $file = move_uploaded_file($source, $destination);
      
       if ($file)
       {
       echo"<script>alert('Record Inserted')</script>";
   }   
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
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

  <link href="assets/plugins/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
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


    <div class="row"> <div class="col-lg-1"></div>
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
               <div class="card-title text-dark"><h4>Venue Master</h4></div>
           <hr>
            <form method="POST" enctype="multipart/form-data">
        
       
         
           <div class="form-group">
            <label for="input-4">Title</label>
            <input type="text" name="title" required="true" class="form-control" id="input-4" placeholder="Enter Venue Title">
           </div>
                
                <div class="form-group">
            <label for="input-4">Details</label>
            <input type="text" name="details" required="true" class="form-control" id="input-4" placeholder="Enter Venue Details">
           </div>
                
                <div class="form-group">
            <label for="input-4">Capacity</label>
            <input type="text" name="capacity" required="true" class="form-control" id="input-4" placeholder="Enter Capacity Details">
           </div>
                
                <div class="form-group">
            <label for="input-4">category</label>
                <?php 
                                              
                                              
                                              $catq = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));
                                              
                                              echo"<select name='cat'class='form-control'>";
                                              
                                              while($catrow = mysqli_fetch_array($catq))
                                              {
                                                  echo "<option  value='{$catrow['cat_id']}'>{$catrow['cat_name']}</option>";
                                              }
                                              
                                              echo "</select>";
                                              
                                              ?>
           </div>
 
                <div class="form-group">
                    <label for="input-4">Image</label>
            <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="logo" id="inputGroupFile04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose Image</label>
                  </div>
            </div>
            </div>
                
                <div class="form-group">
            <label for="input-4">Email</label>
            <input type="email" class="form-control" name="email" required="true" id="input-4" placeholder="Enter Your Email">
           </div>
                <div class="form-group">
            <label for="input-4">website</label>
            <input type="text" class="form-control"name="website" required="true" id="input-4" placeholder="Enter Your Website">
           </div>
                
                <div class="form-group">
            <label for="input-4">Contact No</label>
            <input type="number" class="form-control" required="true" name="contact_no" id="input-4" placeholder="Enter Your Contact no">
           </div>
                
            
        <div class="form-group">
        <label for="basic-textarea" class="col-sm-3 col-form-label">Address</label>
             <div class="col-sm-9">
                 <textarea rows="3" class="form-control" name="addr" required="true" id="basic-textarea"></textarea>
	 </div>
        </div>
                <div class="form-group">
            <label for="input-4">Area</label>
                  <?php 
                                              
                                              
                                              $areaq = mysqli_query($connection, "select * from tbl_area_master") or die(mysqli_error($connection));
                                              
                                              echo"<select name='area' class='form-control'>";
                                              
                                              while($arearow = mysqli_fetch_array($areaq))
                                              {
                                                  echo "<option  value='{$arearow['area_id']}'>{$arearow['area_name']}</option>";
                                              }
                                              
                                              echo "</select>";
                                              
                                              ?>
                </div>
                <div class="form-group">
            <label for="input-4">Name</label>
            <input type="text" class="form-control" required="true" name="pname" id="input-4" placeholder="Enter person Name">
           </div>
           
               <div class="form-group">
            <label for="input-4">Is_Parking</label>
            <p class="text-muted"></p>
            <div class="card-body bt-switch">
                <input type="checkbox" checked data-on-color="success" name="parking" data-off-color="primary" data-on-text="Yes" data-off-text="No">
          </div>
          <label for="input-4">Is_Open</label>
            <p class="text-muted"></p>
            <div class="card-body bt-switch">
                <input type="checkbox" checked data-on-color="success" name="open" data-off-color="danger" data-on-text="Yes" data-off-text="No">
          </div>
           
            <label for="input-4">Is_Wifi</label>
            <p class="text-muted"></p>
            <div class="card-body bt-switch">
                <input type="checkbox" checked data-on-color="success" name="wifi" data-off-color="primary" data-on-text="Yes" data-off-text="No">
          </div>
               </div> 
                
                
                   
                <div class="form-group">
            <label for="input-4">Longtitude</label>
            <input type="text" class="form-control" required="true" name="longtitude" id="input-4" placeholder="Enter Longtitude">
           </div>
                
                   
                <div class="form-group">
            <label for="input-4">Latitude</label>
            <input type="text" class="form-control" required="true" name="latitude" id="input-4" placeholder="Enter Latitude">
           </div>
                
                   
                <div class="form-group">
            <label for="input-4">Minamount</label>
            <input type="text" class="form-control" required="true" name="minamount" id="input-4" placeholder="Enter Minamount">
           </div>
                
            
                         
                <div class="form-group">
            <label for="input-4">Apxamount</label>
            <input type="text" class="form-control" required="true" name="apxamount" id="input-4" placeholder="Enter Apxamount">
           </div>
                
          <div class="form-group">
          <button type="submit" class="btn btn-gradient-royal shadow-primary px-5">Submit</button>
         <button type="button" class="btn btn-gradient-orange shadow-success px-5" onclick="window.location='view-venue-master.php';" name="button"s>view</button>
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
	 <script src="assets/plugins/switchery/js/switchery.min.js"></script>
    <script>
      var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
       });
    </script>

    <!--Bootstrap Switch Buttons-->
    <script src="assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>
</body>

<!-- Mirrored from codervent.com/rukada/color-admin/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Dec 2018 12:35:53 GMT -->
</html>