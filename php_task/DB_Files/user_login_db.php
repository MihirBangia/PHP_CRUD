<?php

include('connection.php');

session_start();

//variables from the form
$email = $_POST['email'];
$password = $_POST['password'];

//insert query
$sql = "select * from user where email='$email' and password='$password'";

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

if($count == 1){  
    $_SESSION['user']= "success";
    echo "<h1><center> Login successful </center></h1>";  
    header("location:../User/user_products.php");
}  
else{  
    echo "<h1> Login failed. Invalid username or password.</h1>";  
}     

mysqli_close($conn);
?>