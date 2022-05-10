 <?php

include'connect.php';

if(isset($_POST['delete_records']) {
echo '<pre>';
// print_r($row);
// die;  {

for($i=0;i<count($id);$i++)
{
 $id[$i];
 $sql = "DELETE crud,crud1 FROM crud INNER JOIN crud1 ON crud.emp_id = crud1.crud_id WHERE crud.emp_id = $id";

     $result=mysqli_query($conn,$sql);
}
}


?>