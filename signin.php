<?php
require './../class/myclass.php';
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rukada/color-admin/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Dec 2018 12:36:20 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Venue Finder</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-dark">
 <!-- Start wrapper-->
 <div id="wrapper">
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Venue Finder</div>
		    <form method = "POST">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="">Email</label>
			   <div class="position-relative has-icon-right">
                               <input type="text" id="exampleInputUsername" name="email" class="form-control input-shadow" placeholder="Enter Email">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="">Password</label>
			   <div class="position-relative has-icon-right">
                               <input type="password" id="exampleInputPassword" name="password" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
		
			 <div class="form-group col-12 text-right">
			  <a href="reset-password.php">Reset Password</a>
			 </div>
			</div>
                        <button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Sign In</button>
			  
			  
			 
			 </form>
		   </div>
		  </div>
		
	     </div>
    
         
    <?php
                                
         if($_POST) {
         // username and password sent from form 
      
        $email = $_POST['email'];
        $password = $_POST['password']; 
        
         
      
      $sql = "SELECT * FROM `tbl_admin` WHERE admin_email = '$email' and admin_pass = '$password' ";
      $result = mysqli_query($connection,$sql);
            
      $row = mysqli_fetch_array($result);
      
        if($row) {
         header("location: index.php");
      }else {
         $error = "Your Login Email or Password is invalid";
      }
   }
    ?>
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
</body>

<!-- Mirrored from codervent.com/rukada/color-admin/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Dec 2018 12:36:20 GMT -->
</html>
