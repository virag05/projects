<?php

require './myclass.php';
    $selectq = mysqli_query($connection, "select * from tbl_admin") or die(mysql_error($connection));
    $count = mysqli_num_rows($selectq);
        echo $count ." Records Found";
        while($adminrow = mysqli_fetch_array($selectq))
            {
                    echo "<tr>";
                    echo "<td>{$adminrow['admin_id']}</td>";
                    echo "<td>{$adminrow['admin_email']}</td>";
                    echo "<td>{$adminrow['admin_pass']}</td>";
                    
                    
                    echo "<td><a href = ''><img style='width:16px;' src='assets/images/icon/edit-icon.png'>Edit </a> | <a href = 'view-admin.php?did={$adminrow['admin_id']}'><img style='width:16px;' src='assets/images/icon/delete-icon.png'>Delete</a></td>";
                    echo "</tr>";
                    
                   
                  
                }
 ?>