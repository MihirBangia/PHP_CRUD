<?php
include('connection.php');
include('adminverify.php');

if(isset($_GET['deleteid'])){
$id = (int)$_GET['deleteid'];
// var_dump($id);


$sql = "delete from brands where brand_id=$id";

$result=mysqli_query($conn,$sql);

var_dump($result);

if($result){
    echo 'deleted successfully';
    header('location:../Admin/brands.php');
}
else{
    die(mysqli_error($conn));
}
}

?>
