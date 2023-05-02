<?php

include('connection.php');
//variables from the form
$sku = (int)$_POST['sku'];
$name = $_POST['name'];
$price = (int)$_POST['price'];
$brand = (int)$_POST['brand'];
$description = $_POST['description'];
$image_file = $_FILES["image"]['name'];

var_dump($image_file);


// Image not defined, let's exit
if (!isset($image_file)) {
    die('No file uploaded.');
}


move_uploaded_file(
    // Temp image location
    $_FILES['image']["tmp_name"],
    "../images/" . $image_file
);
//insert query
$sql = "INSERT INTO products (sku,name,price,brand_id,description,image) VALUES ('$sku','$name', '$price','$brand','$description','$image_file')";
if(isset($_POST['submit'])){
if (mysqli_query($conn, $sql)) {
    echo "New Product Added successfully";
    header("location:../Admin/admin.php");
}} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>