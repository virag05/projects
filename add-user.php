<?php
require './../class/myclass.php';if($_POST)
    if($_POST)
{
    $uname= mysqli_real_escape_string($connection, $_POST['uname']);
    $group1= mysqli_real_escape_string($connection, $_POST['group1']);
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $dob= mysqli_real_escape_string($connection, $_POST['dob']);
    $pass= mysqli_real_escape_string($connection, $_POST['pass']);
    $addr= mysqli_real_escape_string($connection, $_POST['addr']);
    $area= mysqli_real_escape_string($connection, $_POST['area']);
    $contact_no= mysqli_real_escape_string($connection, $_POST['contact_no']);
    
   
   
   $query = mysqli_query($connection, "insert into tbl_user(user_name,gender,email,dob,password,address,area_id,contact_no)values('{$uname}','{$group1}','{$email}','{$dob}','{$pass}','{$addr}','{$area}','{$contact_no}')")or die(mysqli_error($connection));

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


    <div class="row"> <div class="col-lg-1"></div>
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
               <div class="card-title text-dark"><h4>USER</h4></div>
           <hr>
            <form method="POST" enctype="multipart/form-data">
        
           <div class="form-group">
            <label for="input-2">Name</label>
            <input type="text" name="uname"  required="true" class="form-control" id="input-2" placeholder="Enter Your Name">
           </div>
        
                
                <div class="demo-heading">Gender<br>
          <div class="icheck-material-primary icheck-inline">
              <input type="radio" id="inline-radio-primary"  value="male"name="group1" checked/>
                <label for="inline-radio-primary">Male</label>
          </div>
            <div class="icheck-material-primary icheck-inline">
                  <input type="radio" id="inline-radio-info"value="female" name="group1"/>
                <label for="inline-radio-info">Female</label>
              </div>
             </div>
  
                  <div class="form-group">
                      <label for="input-2">Email</label>
                      <input type="email" name="email" required="true" class="form-control" id="input-2" placeholder="Enter Your Email">
           </div>
                  <div class="form-group">
            <label for="input-2">Date Of Birth</label>
            <input type="date" class="form-control"  required="true" name="dob" id="input-2" placeholder="">
           </div>
           <div class="form-group">
            <label for="input-2">Password</label>
            <input type="password"  name="pass" required="true" class="form-control" id="input-2" placeholder="Enter Your Password">
           </div>
          
                <div class="form-group">
                    <label for="basic-textarea" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <textarea rows="3" name="addr"required="true" class="form-control" id="basic-textarea"></textarea>
		 </div>
		</div>
             <div class="form-group">
            <label for="input-2">Area</label>
                                            <?php 
                                              
                                              
                    
                                            $areaq = mysqli_query($connection, "select * from tbl_area_master") or die(mysqli_error($connection));
                                              
                                              echo "<select name='area' class='form-control'>";
                                              
                                              while($arearow = mysqli_fetch_array($areaq))
                                              {
                                                  echo "<option  value='{$arearow['area_id']}'>{$arearow['area_name']}</option>";
                                              }
                                              
                                              echo "</select>";
                                              
                                              ?> 
                 </div>
                <div class="form-group">
            <label for="input-2">Contact No</label>
            <input type="text" name="contact_no" required="true" class="form-control" id="input-2" placeholder="Enter Your Contact Number">
           </div>
          <div class="form-group">
          <button type="submit" class="btn btn-gradient-royal shadow-primary px-5">Submit</button>
         <button type="button" class="btn btn-gradient-orange shadow-success px-5" onclick="window.location='view-user.php';" name="button">view</button>
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

