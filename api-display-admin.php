<?php

require './myclass.php';
$responce = array();
$responce['admin'] = array() ;

    $query = mysqli_query($connection, "select * from tbl_admin") or die(mysql_error($connection));
    $count = mysqli_num_rows($query);
        echo $count ." Records Found";
        
        if($count > 0){
        while($adminrow = mysqli_fetch_array($query))
            {
            $temp = array();
                $temp["admin_id"] = $adminrow["admin_id"];
                $temp["admin_email"] = $adminrow["admin_email"];
                $temp["admin_pass"] = $adminrow["admin_pass"];
            
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