<?php
require './../class/myclass.php';
?>
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
<script type="text/javascript">
    function ConfirmDelete()
    {
        var x = confrim("Are Sure you want to delete");
        if (x)
        {
            return true;
        }else{
            return false;
            
        }
    }
</script>
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
      
           
          <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-table">  </i>  <a href="add-venue-master.php">Add Venue Details</a></h5>
			  <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th scope="col">#</th>
                    
                    <th scope="col">title</th>
                    <th scope="col">details</th>
                    <th scope="col">capacity</th>
                    <th scope="col">category</th>
                   
                    <th scope="col">logo</th>
                    <th scope="col">email</th>
                    <th scope="col">website</th>
                    <th scope="col">contact_no</th>
                    <th scope="col">address</th>
                    <th scope="col">area name</th>
                    <th scope="col">person_name</th>
                    <th scope="col">is_parking</th>
                    <th scope="col">is_open</th>
                    <th scope="col">is_wifi</th>
                    <th scope="col">longtitute</th>
                    <th scope="col">latitude</th>
                    <th scope="col">minamount</th>
                    <th scope="col">apxamount</th> 
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['did']))
                {
                    $did = $_GET['did'];
                    
                    $deleteq = mysqli_query($connection, "delete from tbl_venue_master where ven_id = '{$did}'")or die(mysqli_error($connection));
                    if($deleteq)
                    {
                        echo "<script>alert('Record Deleted');</script>";
                    }
                }
                
                $selectq = mysqli_query($connection, "select * from tbl_venue_master") or die(mysql_error($connection));
                $count = mysqli_num_rows($selectq);
                echo $count ." Records Found";
                while($venrow = mysqli_fetch_array($selectq))
                {
                    echo "<tr>";
                    echo "<td>{$venrow['ven_id']}</td>";
                    echo "<td>{$venrow['title']}</td>";
                    echo "<td>{$venrow['details']}</td>";
                    echo "<td>{$venrow['capacity']}</td>";
                    echo "<td>{$venrow['cat_id']}</td>";
                   
                    echo "<td>{$venrow['logo']}</td>";
                    echo "<td>{$venrow['email']}</td>";
                    echo "<td>{$venrow['website']}</td>";
                    echo "<td>{$venrow['contact_no']}</td>";
                    echo "<td>{$venrow['address']}</td>";
                    echo "<td>{$venrow['area_id']}</td>";
                    echo "<td>{$venrow['person_name']}</td>";
                    echo "<td>{$venrow['is_parking']}</td>";
                    echo "<td>{$venrow['is_open']}</td>";
                    echo "<td>{$venrow['is_wifi']}</td>";
                    echo "<td>{$venrow['longtitude']}</td>";
                    echo "<td>{$venrow['latitude']}</td>";
                    echo "<td>{$venrow['minamount']}</td>";
                    echo "<td>{$venrow['apxamount']}</td>";
                    
                    echo "<td><a href = ''><img style='width:16px;' src='assets/images/icon/edit-icon.png'>Edit </a> | <a Onclick='return ConfirmDelete();' href = 'view-venue-master.php?did={$venrow['ven_id']}'><img style='width:16px;' src='assets/images/icon/delete-icon.png'>Delete</a></td>";
                    echo "</tr>";
                }
                 ?>
                      </tbody>
              </table>
                 
      </div>
     </div>
     </div>
    
    
      </div>
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
