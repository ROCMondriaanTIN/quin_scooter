<?php

    $db = new PDO("mysql:host=localhost;dbname=scooter",
        "root", "");
    $id = $_GET['id'];
    $query = $db->prepare("SELECT * FROM product WHERE category_id= :id");
    $query->bindParam(":id", $id);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">

            <?php

                foreach($result as &$product) {

            ?>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="
                        <?php
                            echo "image/product";
                            echo $product["image"];
                        ?>
                        " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                echo $product["name"];
                            ?>
                        </h5>
                        <p class="card-text">
                            <?php
                                echo $product["description"];
                            ?>
                        </p>
                        <a href="
                            <?php
                                echo "product-detail.php?id=";
                                echo $product["id"];
                            ?>

                        " class="btn btn-primary">Go to product details</a>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>

        </div>
    </div>
</body>
</html>




