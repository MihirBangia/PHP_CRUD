<?php
include('../DB_Files/connection.php');
include ('../DB_Files/adminverify.php');
$id = $_GET['updateid'];
$name;
$image;
if($id){
$sql = "select * from brands where brand_id = $id";
$result = mysqli_query($conn, $sql);
if($result>0){
    $row = mysqli_fetch_assoc($result);
    $name = $row['brand_name'];
    $image = $row['brand_logo'];
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand</title>
</head>
<body>
    <form action="../DB_Files/addbrands_db.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
        <fieldset>
         <label for="brandname"> Enter brand name:</label>
         <input type="text" name="brandname" id="brandname" value="<?=$name?>"> <br> <br>
         <label for="image">Insert Brand Logo</label>
         <input type="file" name="image" id="image"> <br> <br>
         <input type="submit" value="submit">
        </fieldset>
    </form>
</body>
</html>