<?php

include 'session_a.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];  
   
    
        include 'connection.php';
      
        
        $sql = "UPDATE tbl_appliedjobs SET status='Rejected' WHERE id='$id';";
        $result=$conn->query($sql);
        header('location: a_viewapplicants.php');
}else{     
                header('location: index.php?msg=dup');
}
                die();
?>