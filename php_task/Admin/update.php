<?php
include('../DB_Files/connection.php');
include('../DB_Files/adminverify.php'); 

$brand = 'select * from brands';
$result = $conn->query($brand);

$id=$_GET['updateid'];
//insert query
$sql2= "select * from products where id=$id";

$result2 = mysqli_query($conn, $sql2);

$row = mysqli_fetch_assoc($result2);



if(isset($_POST['submit'])){
    $id=$_GET['updateid'];

$sku = (int)$_POST['sku'];
$name = $_POST['name'];
$price = (int)$_POST['price'];
$brand = (int)$_POST['brand'];
$description = $_POST['description'];
$image_file = $_FILES["image"]['name'];

if (!isset($image_file)) {
    die('No file uploaded.');
}


move_uploaded_file(
    // Temp image location
    $_FILES['image']["tmp_name"],
    
    // New image location, __DIR__ is the location of the current PHP file
     "../images/" . $image_file
);


$sql = "update products set sku=$sku,name='$name',price=$price,brand_id=$brand,description='$description',image='$image_file' where id=$id";



if (mysqli_query($conn, $sql)) {
    echo " Product Updated successfully";
    header("location:admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Below Product Details</legend><br>

            <label for="price">Enter SKU Id</label>
            <input type="number" name="sku" id="sku" placeholder="Enter Product SKU id" value="<?=$row['sku']?>"><br><hr> 

            <label for="name">Enter Product Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Product Name" value="<?=$row['name']?>"><br><hr>

            <label for="price">Enter Product Price</label>
            <input type="number" name="price" id="price" placeholder="Enter Product Price" value="<?=$row['price']?>"><br><hr> 
       
            <label for="brand">Select Brand Name:</label>
            <!-- <select name="brand" id="brand">
                <option value="1">Apple</option>
                <option value="2">Motorola</option>
                <option value="3">Redmi</option>
                <option value="4">Oppo</option>
            </select> <br> <hr> -->
            <select name="brand" required=true class="form-control" value="<?=$brand?>">
                	<option disabled selected value="">-----Please select Brand-----</option>
                	<?php
                	if($result->num_rows>0){ 
                		while($rows=$result->fetch_assoc()){ ?>
                			<option <?php if($row['brand_id']==$rows['brand_id']) echo 'selected'; ?> value="<?=$rows['brand_id'] ?>"><?= $rows['brand_name'] ?></option>

                		<?php }

                	 }
                	?>
                </select> <br/> <hr>

            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
           <span>Previous Image is:</span> <img src="../images/<?php echo($row['image']); ?>" alt="previous image" width="100px" height="100px"> 
            <br><hr>

            <label for="description">Enter Product Description:</label>
            <textarea name="description" id="description" cols="40" rows="2" placeholder="Enter Product Description"><?=$row['description']?></textarea><br><hr>
            <input type="submit" value="Update" name="submit">
        </fieldset>
    </form>

</body>
</html>