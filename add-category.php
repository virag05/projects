


<?php
require './../class/myclass.php';
if($_POST)
{
    $catname= mysqli_real_escape_string($connection, $_POST['catname']);
   $source = $_FILES['catimgurl']['tmp_name'];
 $destination = "upload/".$_FILES['catimgurl']['name'];
   
    
   $query = mysqli_query($connection,"insert into tbl_category(cat_name,cat_imgurl)values('{$catname}','{$destination}')")or die(mysqli_error($connection));

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


    <div class="row">        <div class="col-lg-1"></div>
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
               <div class="card-title text-dark"><h4>Category</h4></div>
           <hr>
            <form method="POST" enctype="multipart/form-data">
        
           <div class="form-group">
            <label for="input-2">Name</label>
            <input type="text" class="form-control" required="true" name="catname" id="input-2" placeholder="Enter Category Name">
           </div>
         
           <div class="form-group">
                    <label for="input-2">Image</label>
             <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="catimgurl" id="inputGroupFile04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose Image</label>
                  </div>
            </div>
            </div>
            
          <div class="form-group">
          <button type="submit" class="btn btn-gradient-royal shadow-primary px-5">Submit</button>
         <button type="button" class="btn btn-gradient-orange shadow-linkedin px-5"onclick="window.location='view-category.php';" name="button">view</button>
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
