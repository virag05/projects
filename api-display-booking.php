<?php

require './myclass.php';
$responce = array();
$responce['book'] = array() ;

$sql = "SELECT
    `tbl_booking`.`booking_id`
    , `tbl_booking`.`date`
    , `tbl_user`.`user_name`
    , `tbl_venue_master`.`title`
    , `tbl_slot_master`.`slot_name`
    , `tbl_booking`.`status`
    , `tbl_booking`.`price`
FROM
    `db_venue`.`tbl_booking`
    INNER JOIN `db_venue`.`tbl_venue_master` 
        ON (`tbl_booking`.`ven_id` = `tbl_venue_master`.`ven_id`)
    INNER JOIN `db_venue`.`tbl_slot_master` 
        ON (`tbl_booking`.`slot_id` = `tbl_slot_master`.`slot_id`)
    INNER JOIN `db_venue`.`tbl_user` 
        ON (`tbl_booking`.`user_id` = `tbl_user`.`user_id`)
ORDER BY `tbl_booking`.`booking_id` ASC;";

    $query = mysqli_query($connection, $sql) or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        //echo $count ." Records Found";
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["booking_id"] = $adminrow["booking_id"];
                $temp["date"] = $adminrow["date"];
                $temp["user_name"] = $adminrow["user_name"];
                $temp["title"] = $adminrow["title"];
                $temp["slot_name"] = $adminrow["slot_name"];
                $temp["status"] = $adminrow["status"];
                $temp["price"] = $adminrow["price"];
            
                array_push($responce['book'], $temp);
            }
        if($query){
           $responce['flag'] = '1';
           $responce['message'] = 'Records Found';
        }else{
            $responce['flag'] = '0';
            $responce['message'] = 'no record found';
         }
        }else{
            $responce['flag'] = '0';
            $responce['message'] = 'required field is missing';
        }
    echo json_encode($responce);               
 ?>