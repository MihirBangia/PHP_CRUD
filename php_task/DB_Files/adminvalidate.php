<?php
include('connection.php');
session_start();
$email= $_POST['email'];
$password= $_POST['password'];

$sql = "select * from admin_user where email='$email' and password='$password'";

$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    $_SESSION['admin'] = "Success";
    header('location:../Admin/admin.php');
}
else{
    echo("Invalid Credentials");
}
?>