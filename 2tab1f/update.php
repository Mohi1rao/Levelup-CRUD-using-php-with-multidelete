<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
 
$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die(mysqli_error($conn));
   }

   $id=$_GET['updateid'];

// $sql="SELECT * FROM `crud` WHERE emp_id=$id";
// $result=mysqli_query($conn,$sql);


//$sql = "SELECT crud.*, crud1.* FROM crud LEFT JOIN crud1 ON crud.emp_id = crud1.crud_id WHERE crud.emp_id = '$id'";


$sql = "SELECT  * from crud INNER JOIN crud1 on crud.emp_id=crud1.crud_id";

$result=mysqli_query($conn,$sql);


$row=mysqli_fetch_assoc($result);
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];
        $city=$row['city'];
        $pincode=$row['pincode'];
        

   
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];

$sql1 = "UPDATE `crud` SET emp_id=$id, name='$name', email='$email', mobile='$mobile',  password='$password' WHERE emp_id=$id";

$sql2 = "UPDATE `crud1` SET crud_id=$id, city='$city', pincode='$pincode' WHERE crud_id=$id";

$result = $conn->query($sql1);
$result = $conn->query($sql2);

if ($result) {
  //echo "data updated successfully";
  header('location:display.php');

}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>






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
            <input type="text" name="name" id="name" placeholder="Enter your name" value=<?php 
            echo $name;?>>
            <input type="text" name="email" id="email" placeholder="Enter your email" value=<?php 
            echo $email;?>>
            <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile" value=<?php 
            echo $mobile;?>>
            <input type="text" name="password" id="password" placeholder="Enter your password" value=<?php echo $password;?>>
            <input type="text" name="city" id="city" placeholder="Enter your city" value=<?php echo $city;?>>
            <input type="text" name="pincode" id="pincode" placeholder="Enter your pincode" value=<?php 
            echo $pincode;?>>

            <input type="submit" name="submit" value="update" class="btn">
            

        </form>
    </div>
    
    
</body>
</html>