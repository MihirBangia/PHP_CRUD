<?php include('../DB_Files/userverify.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLP</title>
</head>

<body>
    <h1>Product Listing Page</h1>

    <a href="../DB_Files/userlogout.php"><button class="btn btn-danger">Logout</button></a>
    <hr>

    <div class="container">
        <div class="row">
            <?php
            include('../DB_Files/connection.php');

            $sql = 'select * from products';
            $result = mysqli_query($conn, $sql);

            // var_dump($result);
            
            if (mysqli_num_rows($result) > 0) {
                // OUTPUT DATA OF EACH ROW
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../images/<?= $row['image']?>"
                                class="card-img-top" alt="productimage">
                                
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $row['name'] ?>
                                </h5>
                                <p class="card-text">
                                    <?= $row['description'] ?>
                                </p>
                            </div>
                            <div class="card-body">
                                <!-- <p class="card-text">
                                    <?= $row['Brand'] ?>
                                </p> -->
                                <p class="card-text">Rs.
                                    <?= $row['price'] ?>
                                </p>

                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                echo "0 results";
            }

            // foreach($row as $data){
            //     //  echo $data; 
            // }
            ?>
        </div>
    </div>

</body>

</html>