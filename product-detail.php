<?php

    $db = new PDO("mysql:host=localhost;dbname=scooter",
        "root", "");
    $id = $_GET['id'];
    $query = $db->prepare("SELECT * FROM product WHERE id= :id");
    $query->bindParam(":id", $id);
    $query->execute();

    $product = $query->fetch(PDO::FETCH_ASSOC);

    $query = $db->prepare("SELECT * FROM product_property WHERE product_id= :id");
    $query->bindParam(":id", $id);
    $query->execute();

    $productProperties = $query->fetchAll(PDO::FETCH_ASSOC);

    //get categoryId from first product for breadcrumb
    $categoryId = $product['category_id'];

    $query = $db->prepare("SELECT * FROM category WHERE id= :id");
    $query->bindParam(":id", $categoryId);
    $query->execute();

    $category = $query->fetch(PDO::FETCH_ASSOC);

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
<a href="index.php">Back to categories</a> > <a href="product.php?id=<?php echo $categoryId ?>">Back to <?php echo $category['name'] ?></a>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
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
                        <h5>Product properties</h5>
                        <ul>
                            <?php

                            foreach($productProperties as &$productProperty) {

                            ?>
                            <li>
                                <?php
                                    echo $productProperty["label"];
                                    echo " - ";
                                    echo $productProperty["value"];
                                ?>
                            </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>
</html>




