<?php

include'connect.php';
if(isset($_GET['deleteid']))

{
    $id=$_GET['deleteid'];


   
     $sql = "DELETE crud,crud1 FROM crud INNER JOIN crud1 ON crud.emp_id = crud1.crud_id WHERE crud.emp_id = $id";

     $result=mysqli_query($conn,$sql);
     if($result)
     {
        header('location:display.php');
     }
    
}

?>