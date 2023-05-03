<?php include('../DB_Files/adminverify.php');
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</head>

<body>
    <h1>Welcome <?php echo $_SESSION['admin']?></h1> <br> <hr>
    <a href="addproducts.php"><button class="btn btn-primary">Add Products</button></a>
    <a href="./brands.php"><button class="btn btn-dark">Brands</button></a> 
    <a href="../DB_Files/logout.php"><button class="btn btn-danger">Logout</button></a> 
    <br> <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"> Sku Id</th>
                <th scope="col">ProductName</th>
                <th scope="col">ProductPrice</th>
                <th scope="col">Image</th>
                <th scope="col">ProductDescription</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>


        <tbody>

            <?php

            include('../DB_Files/connection.php');

            //variables from the form
                $sql2 = 'select * from products';
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    // OUTPUT DATA OF EACH ROW
                    while ($row = mysqli_fetch_assoc($result2)) { ?>
                            <tr>
                                <td>
                                    <?= $row['sku'] ?>
                                </td>

                                <td>
                                    <?= $row['name'] ?>
                                </td>
                                <td>
                                    <?= $row['price'] ?>
                                </td>
                                <td>
                                   <img src="../images/<?= $row['image']?>" alt="productimage" width="120px" height="120px">  
                                </td>
                                <td>
                                    <?= $row['description'] ?>
                                </td>
                                <td><a href="update.php?updateid=<?php echo $row['id'] ?>"><button class="btn btn-warning">  Edit </button></a></td>
                                <td><a href="../DB_Files/delete.php?deleteid=<?php echo $row['id']?>"><button class="btn btn-danger" onclick="return myFunction()">  Delete </button></a></td>
                            </tr>
                   
                
            <?php } ?>
             </tbody>
             </table>
                <?php } else {
                    echo "0 results";
                }

            mysqli_close($conn);
            ?>

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