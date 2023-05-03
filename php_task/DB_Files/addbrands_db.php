<?php
include('../DB_Files/connection.php');

$id = $_GET['id'];

$brandname = $_POST['brandname'];
$image_file = $_FILES["image"]['name'];
//   var_dump($image_file);

        if (!isset($image_file)) {
        die('No file uploaded.');
        }
        
        
        move_uploaded_file(
            // Temp image location
            $_FILES['image']["tmp_name"],
            "../brandimages/" . $image_file
        );

        if($id){
            $sql2 = "update brands set brand_name = '$brandname',brand_logo = '$image_file' where brand_id= $id";
            if (mysqli_query($conn, $sql2)) {
                echo "New Product updated successfully";
                header("location:../Admin/brands.php");
            } 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        else{

        

        $sql = "INSERT INTO brands (brand_name,brand_logo) VALUES ('$brandname','$image_file')";
       
        if (mysqli_query($conn, $sql)) {
            echo "New Product Added successfully";
            header("location:../Admin/brands.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
        mysqli_close($conn);
    ?>