<?php

require './myclass.php';
//Blank Array
$response = array();
//If Developer Pass Catid Then It will Filter SubCategory Category Wise
if (isset($_GET['cat_id'])) {

    $cat_id = mysqli_real_escape_string($connection, $_GET['cat_id']);
    $productquery = mysqli_query($connection, "select * from  tbl_venue_master where cat_id ='{$cat_id}' ") or die(mysqli_error($connection));
} else if (isset($_GET['ven_id'])) {

    $ven_id = mysqli_real_escape_string($connection, $_GET['ven_id']);
    // Display Single Product Using PID Parameter
    $productquery = mysqli_query($connection, "select * from  tbl_venue_master where ven_id ='{$ven_id}'") or die(mysqli_error($connection));
} else {
//Display All SubCategory from the DB
    $productquery = mysqli_query($connection, "select * from  tbl_venue_master") or die(mysqli_error($connection));
}

//Number of Record
$count = mysqli_num_rows($productquery);

if ($count > 0) {

    while ($row = mysqli_fetch_array($productquery)) {
        $categoryq = mysqli_query($connection, "select * from tbl_category where cat_id ='{$row['cat_id']}' ") or die(mysqli_error($connection));
        $categoryrow = mysqli_fetch_array($categoryq);

        $tempdata['ven_id'] = $row['ven_id'];
        $tempdata['title'] = $row['title'];
        $tempdata['capacity'] = $row['capacity'];
        $tempdata['email'] = $row['email'];

        $tempdata['contact_no'] = $row['contact_no'];
        $tempdata['address'] = $row['address'];
		$tempdata['is_parking'] = $row['is_parking'];
		$tempdata['is_open'] = $row['is_open'];
		$tempdata['is_wifi'] = $row['is_wifi'];
                $tempdata['apxamount'] = $row['apxamount'];
		$tempdata['cat_id'] = $row['cat_id'];

        
        
        //Product Photo Get 
        
//$productphotoq = mysqli_query($connection, "select * from  tbl_product_photo where product_id='{$row['product_id']}'") or die(mysqli_error($connection));
//$count = mysqli_num_rows($productphotoq);

//if ($count > 0) {

  //  while ($row = mysqli_fetch_array($productphotoq)) {

    //    $tempdata1['product_photo_id'] = $row['product_photo_id'];
      //  $tempdata1['product_id'] = $row['product_id'];
        //$tempdata1['photo_path'] = $baseurl . $imageupload_folder . $row['photo_path'];
 
        //Blank Array and Add value into FetchData
       // $temp_array1[] = $tempdata1;
    //}
    
        //Blank Array and Add value into FetchData
       $temp_array[] = $tempdata;
        
   // array_push($temp_array, $temp_array1);
    
    //$response['flag'] = 1;
    
   // $response['message'] = "$count Record Found.";
//}kpa
        
        
        
        
    }
    $response['venue'] = $temp_array;
    $response['flag'] = 1;
    $response['message'] = "$count Record Found.";
} else {
    $response['flag'] = 0;
    $response['message'] = "No Record Found.";
}
echo json_encode($response);
