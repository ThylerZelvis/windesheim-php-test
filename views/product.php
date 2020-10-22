<?php

/**
 * Product HTML Page
 */

require __DIR__ . "/../classes/Product.php";

use classes\Product;

include __DIR__ . "/../environment/connection.php";

$request = $_POST;

if (isset($request['name']) && isset($request['description']) && isset($request['price'])) {
    Product::makeNewProduct($connection, $request['name'], $request['description'], $request['price']);
}

/**
 * @var Product[] $products
 */
$products = Product::getAllProducts($connection);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="offset-sm-2 col-sm-4">
            <h1>Voeg een product toe!</h1>

            <form action="product.php" method="POST">
                <label class="mt-3" for="name">Naam</label>
                <input class="form-control" id="name" type="text" name="name">

                <label class="mt-3" for="description">Omschijving</label>
                <textarea class="form-control" id="description" type="text" name="description"></textarea>

                <label class="mt-3" for="price">Prijs</label>
                <input class="form-control" id="price" type="number" name="price">
                <small><i>Prijs is in euro's</i></small>

                <br>
                <button type="submit" class="btn btn-success mt-3">Voeg product toe!</button>
            </form>
        </div>
        <div class="col-sm-4">
            <h1>Producten in de DB!</h1>
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Omschrijving</th>
                    <th scope="col">Prijs</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (count($products) > 0) {
                    foreach ($products as $product) {
                        ?>
                        <tr>
                            <th><?php print $product->id ?></th>
                            <td><?php print $product->name ?></td>
                            <td><?php print $product->description ?></td>
                            <td>€ <?php print $product->price ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        Er zijn nog geen producten.
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

</body>
</html>
