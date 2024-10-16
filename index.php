<?php

    $db = new PDO("mysql:host=localhost;dbname=scooter",
        "root", "");
    $query = $db->prepare("SELECT * FROM category");
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

    <title>Category</title>
</head>
<body>
    <div class="container">
        <div class="row">

            <?php

                foreach($result as &$category) {

            ?>

            <div class="col-md-4 d-flex align-items-stretch ">
                <div class="card " style="width: 18rem;">
                    <img src="
                        <?php
                            echo "img/category/";
                            echo $category["image"];
                        ?>
                        " class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-end">
                        <h5 class="card-title">
                            <?php
                                echo $category["name"];
                            ?>
                        </h5>
                        <p class="card-text">
                            <?php
                                echo $category["description"];
                            ?>
                        </p>
                        <a href="
                            <?php
                                echo "product.php?id=";
                                echo $category["id"];
                            ?>

                        " class="btn btn-primary">Go to products</a>
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
