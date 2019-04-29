<?php

require './myclass.php';
$responce = array();
$responce['category'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_category") or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["cat_id"] = $adminrow["cat_id"];
                $temp["cat_name"] = $adminrow["cat_name"];
                $temp["cat_imgurl"] = $adminrow["cat_imgurl"];
            
                array_push($responce['category'], $temp);
            }
        if($query){
           $responce['flag'] = '1';
           $responce['message'] = 'Records Found';
        }else{
            $responce['flag'] = '0';
            $responce['message'] = 'no record found';
         }
        }else{
            $responce['flage'] = '0';
            $responce['message'] = 'required field is missing';
        }
    echo json_encode($responce);               
 ?>