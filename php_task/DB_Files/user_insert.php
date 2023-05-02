<?php

include('connection.php');
//variables from the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

//insert query
$sql = "INSERT INTO user (firstname,lastname,email,password) VALUES ('$firstname','$lastname', '$email','$password')";
if(isset($_POST['submit'])){
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>