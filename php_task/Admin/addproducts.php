<?php include('../DB_Files/adminverify.php'); 
include('../DB_Files/connection.php');
$brand = 'select * from brands';
$result = $conn->query($brand);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
</head>
<body>
    <form action="../DB_Files/addprod_db.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Below Product Details</legend><br>

            <label for="price">Enter SKU Id</label>
            <input type="number" name="sku" id="sku" placeholder="Enter Product SKU id"><br><hr> 

            <label for="name">Enter Product Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Product Name"><br><hr>

            <label for="price">Enter Product Price</label>
            <input type="number" name="price" id="price" placeholder="Enter Product Price"><br><hr> 
       
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
                		while($row=$result->fetch_assoc()){ ?>
                			<option value="<?=$row['brand_id'] ?>"><?= $row['brand_name'] ?></option>

                		<?php }

                	 }
                	?>
                </select> <br/> <hr>
            
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image"><br><hr>

            <label for="description">Enter Product Description:</label>
            <textarea name="description" id="description" cols="40" rows="2" placeholder="Enter Product Description"></textarea><br><hr>
            <input type="submit" value="submit" name="submit">
        </fieldset>
    </form>

   
</body>
</html>