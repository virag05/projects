<?php

require './myclass.php';
$responce = array();
$responce['venue'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_venue_master") or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        
        
        if($count > 0){
        while($venuerow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["ven_id"] = $venuerow["ven_id"];
                $temp["title"] = $venuerow["title"];
                $temp["details"] = $venuerow["details"];
                $temp["capacity"] = $venuerow["capacity"];
                $temp["cat_id"] = $venuerow["cat_id"];
            
                $temp["logo"] = $venuerow["logo"];
                $temp["email"] = $venuerow["email"];
                $temp["website"] = $venuerow["website"];
                $temp["contact_no"] = $venuerow["contact_no"];
                $temp["address"] = $venuerow["address"];
                $temp["area_id"] = $venuerow["area_id"];
                $temp["person_name"] = $venuerow["person_name"];
                $temp["is_parking"] = $venuerow["is_parking"];
                $temp["is_open"] = $venuerow["is_open"];
                $temp["is_wifi"] = $venuerow["is_wifi"];
                $temp["longtitude"] = $venuerow["longtitude"];
                $temp["latitude"] = $venuerow["latitude"];
                $temp["minamount"] = $venuerow["minamount"];
                $temp["apxamount"] = $venuerow["apxamount"];
                            
                array_push($responce['venue'], $temp);
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