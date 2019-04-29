<?php

require './myclass.php';
$responce = array();
$responce['SLOT'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_slot_master") or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["slot_id"] = $adminrow["slot_id"];
                $temp["slot_name"] = $adminrow["slot_name"];
                            
                array_push($responce['SLOT'], $temp);
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