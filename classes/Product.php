<?php

namespace classes;

use mysqli;
use mysqli_result;

/**
 * Class Product
 */
class Product {

    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $description
     */
    public $description;

    /**
     * @var integer $price
     *
     * In the DB the price is stored in cents
     */
    public $price;

    /**
     * SQL Query to get all the products from the database
     */
    const GET_PRODUCTS_QUERY = "SELECT id, name, description, price FROM product";

    /**
     * SQL Query to make a new project
     */
    const MAKE_NEW_PRODUCT_QUERY = "INSERT INTO product (name, description, price) VALUES (?, ?, ?)";

    /**
     * Get all the products form the database
     *
     * @param mysqli $connection
     * @return object|null
     */
    public static function getAllProducts(mysqli $connection) {
        $statement = mysqli_prepare($connection, Product::GET_PRODUCTS_QUERY);

        // Execute the SQL statement
        mysqli_stmt_execute($statement);

        // Get the products
        $result = mysqli_stmt_get_result($statement);

        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return static::toObject($products);
    }

    /**
     * @param mysqli $connection
     * @param string $name
     * @param string $description
     * @param int $price
     * @return false|mysqli_result
     */
    public static function makeNewProduct(mysqli $connection, string $name, string $description, int $price) {
        $statement = mysqli_prepare($connection, Product::MAKE_NEW_PRODUCT_QUERY);

        mysqli_stmt_bind_param($statement, "ssi", $name, $description, $price);

        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);

        return $result;
    }

    /**
     * Convert array to object
     *
     * @param array $array
     * @return object|null
     */
    private static function toObject(array $array)
    {
        return json_decode(json_encode($array), false);
    }
}
