<?php

require './myclass.php';
$responce = array();
$responce['admin'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_user") or die(mysqli_error($connection));
    $count = mysqli_num_rows($query);
        echo $count ." Records Found";
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["user_id"] = $adminrow["user_id"];
                $temp["user_name"] = $adminrow["user_name"];
                $temp["gender"] = $adminrow["gender"];
                $temp["email"] = $adminrow["email"];
                $temp["dob"] = $adminrow["dob"];
                $temp["password"] = $adminrow["password"];
                $temp["address"] = $adminrow["address"];
                $temp["area_id"] = $adminrow["area_id"];
                $temp["contact_no"] = $adminrow["contact_no"];
                            
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