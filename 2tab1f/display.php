<?php
include 'connect.php';
error_reporting(0);
if (isset($_POST["submit"]))
 { {
if (count($_POST["emp_ids"]) > 0 ) {

$all = implode(",", $_POST["emp_ids"]);

$sql = "DELETE crud,crud1 FROM crud INNER JOIN crud1 ON crud.emp_id = crud1.crud_id WHERE crud.emp_id in ($all)";

     $result=mysqli_query($conn,$sql);

if ($sql) {
$errmsg ="Data has been deleted successfully";
} else {
$errmsg ="Error while deleting. Please Try again.";
}
} else {
$errmsg = "You need to select atleast one checkbox to delete!";
}
}}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script language="javascript" src="users.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light"> ADD USER </a>
            </button>

            <table class="table">
  <thead>
  <form name="multipledeletion" method="post">
<div class="container">
<div class="row col-md-6 col-md-offset-2 custyle">

<p style="color:red; font-size:16px;">
<?php if($errmsg){ echo $errmsg; } ?> </p>
<table class="table table-striped custab">

<tr>
<td colspan="7"> <input type="submit" name="submit" value="Multi_Delete" class="btn btn-primary " onClick="return confirm('Are you sure you want to delete?');" ></td>
</tr>
    <tr>

      <th scope="col">S.no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Salary</th>
      <th scope="col">Operation</th>
      <th><input type="checkbox" id="select_all" value=""></th>


    </tr>
  </thead>
  <tbody>


  <?php

$sql = "SELECT  * from crud";

  $result=mysqli_query($conn,$sql);
  if($result){

    $sn=1;




    while ($row=mysqli_fetch_array($result)) {
        ?>
        <tr>
        
        <td><?php echo htmlentities($row['emp_id']);?></td>
        <td><?php echo htmlentities($row['name']);?></td>
        <td><?php echo htmlentities($row['email']);?></td>
        <td><?php echo htmlentities($row['mobile']);?></td>
        <td><?php echo htmlentities($row['password']);?></td>


        <td>
        <button class="btn btn-primary" ><a href="user.php? updateid='.$id.'" class="text-light" >Edit</a></button>
        <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light" >delete</a></button>
        </td>
        <!-- <td><input type="checkbox" class="checkbox" name="no[]" value="<?php echo $id;?>"/></td> -->

        <td><input type="checkbox" class="checkbox" name="emp_ids[]" value="<?php echo htmlentities($row['emp_id']);?>"/></td>
        </tr>
        <?php
         $sn++;    
         } } else { ?>
        <tr>
        <td colspan="4"><a href="rollback.php"> Roll back all data</a></td>
        </tr>
        <tr>
        <td colspan="4"> No Record Found</td>
        </tr>
        <?php } ?>






      
      <!-- while($row=mysqli_fetch_assoc($result)){

        $id=$row['emp_id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];
 


     
          echo'<tr>
         <th scope="row">'.$sn.'</th>
         <td>'.$name.'</td>
         <td>'.$email.'</td>
         <td>'.$mobile.'</td>
         <td>'.$password.'</td>
         
         -->
 
 
         <!-- <td>
        <button class="btn btn-primary" ><a href="user.php? updateid='.$id.'" class="text-light" >Edit</a></button>
        <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light" >delete</a></button>
        </td>
        <td><input type="checkbox" class="checkbox" name="no[]" value="<?php echo $id;?>"/></td>
        </tr>'; -->

   

   
  </tbody>
</table>

   
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#select_all').on('click',function(){
if(this.checked){
$('.checkbox').each(function(){
this.checked = true;
});
}else{
$('.checkbox').each(function(){
this.checked = false;
});
}
});
$('.checkbox').on('click',function(){
if($('.checkbox:checked').length == $('.checkbox').length){
$('#select_all').prop('checked',true);
}else{
$('#select_all').prop('checked',false);
}
});
});
</script>
</body>
</html>