<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new user</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <style>
        *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    
font-family: 'Roboto', sans-serif;
}

.container{
    max-width: 50%; 
    padding: 34px; 
    margin: auto;
}

.container h1 {
    text-align: center;
    font-family: 'Architects Daughter', cursive;
    font-size: 40px;
}

p{
    font-size: 20px;
    text-align: center;
    font-family: 'Architects Daughter', cursive;
    

}

input, textarea{
    
    border: 2px solid #aa90ee;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.btn{
    background: dodgerblue;
    color: rgb(255, 255, 255);
    padding: 8px 12px;
    font-size: 20px;
    border: 2px solid rgb(255, 255, 255);
    border-radius: 14px;
    cursor: pointer;
    max-width: 20%; 
}
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile">
            <input type="text" name="password" id="password"  placeholder="Enter Salary">
            <input type="text" name="city" id="city" placeholder="Enter your city">
            <input type="text" name="pincode" id="pincode"   placeholder="Enter your pincode">
            <input type="text" name="work" id="work"  placeholder="Enter your work">
            <input type="hidden" id="empId" name="empId" value="3487">

            <input type="submit" name="save" value="save" class="btn">
            

        </form>
    </div>
    
    
</body>
</html>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1form";
 
$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die(mysqli_error($conn));
   }

   $id='';
   $id=$_GET['updateid'];

if($id)
{

   

 
$sql = "SELECT  * from crud INNER JOIN crud1 on crud.emp_id=crud1.crud_id";

$result=mysqli_query($conn,$sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // if (isset( $_POST['empId'])){



$row=mysqli_fetch_assoc($result);
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];
        $city=$row['city'];
        $pincode=$row['pincode'];
        $work=$row['work'];
                                                            
// echo '<pre>';
// print_r($row);
// die;  
 // if(!$empId) {
if(isset($_POST['save']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];
  $work = $_POST['work'];


$sql1 = "UPDATE `crud` SET emp_id=$id, name='$name', email='$email', mobile='$mobile',  password='$password' WHERE emp_id=$id";

$sql2 = "UPDATE `crud1` SET crud_id=$id, city='$city', pincode='$pincode', work='$work' WHERE crud_id=$id";

$result = $conn->query($sql1);
$result = $conn->query($sql2);

if ($result) {
  //echo "data updated successfully";
  header('location:display.php');

}}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
}





 else{
     if(isset($_POST['save']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];
  $work = $_POST['work'];

  $sql3 = "INSERT INTO crud (name, email, mobile, password) VALUES ('$name','$email', '$mobile', '$password')";

  $result = $conn->query($sql3);
  $last_id= mysqli_insert_id($conn);
  
 $sql4 = "INSERT INTO crud1 (city, pincode, work, crud_id) VALUES ('$city','$pincode', '$work', '$last_id')";
 $result = $conn->query($sql4);

if ($result) {
 // echo $last_id ;
  header('location:display.php');
 
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}

?>

