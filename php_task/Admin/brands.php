<?php
include('../DB_Files/connection.php');
include ('../DB_Files/adminverify.php');

$sql = "select * from brands";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
</head>
<body>
    <h2> Brand Section</h2>
    <a href="./addbrand.php"> <button>Add Brands</button> </a> <br>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>BrandName</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {?>

    <?php
        $id = $row['brand_id'];
        $name= $row['brand_name'];
        $image = $row['brand_logo'];
    ?>
        <tr>

        <td>
            <?php echo $id;?>
        </td>

        <td>
            <?php echo $name;?>
        </td>

        <td>
          <img src="../brandimages/<?php echo $image?>" alt="brandlogo" width="70px" height="70px">  
        </td>

        <td>
           <a href="./addbrand.php?updateid=<?php echo $id ?>"> <button>Update</button> </a>
        </td>

        <td>
           <a href="../DB_Files/branddelete.php?deleteid=<?php echo $id?>"><button onclick="return myFunction()">Delete</button></a>
        </td>

        </tr>

        <?php } ?>
        </tbody>
    </table>
    <?php } else {
                    echo "0 results";
                }?>


<script>
            function myFunction() {
                if (confirm('Are you sure you want to delete') === true) {
                return true;
                     } else {
                            return false;
                          }
                                }
            </script>

</body>
</html>