<?php

require './myclass.php';
$responce = array();
$responce['sub_cat'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_sub_category") or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["sub_id"] = $adminrow["sub_id"];
                $temp["sub_name"] = $adminrow["sub_name"];
                $temp["cat_id"] = $adminrow["cat_id"];
                $temp["sub_imgurl"] = $adminrow["sub_imgurl"];
                            
                array_push($responce['sub_cat'], $temp);
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