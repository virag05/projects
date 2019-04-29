<?php

require './myclass.php';
$responce = array();
$responce['admin'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_booking") or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        echo $count ." Records Found";
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["booking_id"] = $adminrow["booking_id"];
                $temp["date"] = $adminrow["date"];
                $temp["user_id"] = $adminrow["user_id"];
                $temp["ven_id"] = $adminrow["ven_id"];
                $temp["slot_id"] = $adminrow["slot_id"];
                $temp["status"] = $adminrow["status"];
                $temp["price"] = $adminrow["price"];
            
                array_push($responce['admin'], $temp);
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