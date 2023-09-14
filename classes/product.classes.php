<?php

// Include database handler class
include("dbh.classes.php");

class Product extends Dbh
{
    // Select products from given table
    private function get_product(string $table)
    {
        // Create and prepare SQL query
        $sql = "SELECT * FROM $table";
        $stmt = $this->connect()->prepare($sql);

        // Execute query
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        // Fetch products from the table
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return array of products
        return $products;
    }

    // Display products to page
    public function display_product(string $table)
    {
        // Select products from the database
        $products = $this->get_product($table);

        // Iterate over products
        foreach ($products as $product) {
            $product_img = $product["product_img"]; // Product image
            $product_name = $product["product_name"]; // Product name
            $product_rating = $product["product_rating"]; // Product rating in float value (e.g. 4.5)
            $product_price = $product["product_price"]; // Product price in float value (e.g. 120, 118.5)

            // Product container div
            echo "<div class='flex-shrink-0 w-3/5 product-container'>";
            echo "<img src='../uploads/$table/$product_img' alt='product image'>"; // Product image
            echo "<h1 class='font-raleway font-semibold mt-2'>$product_name</h1>"; // Product name
            echo "<div class='rating-div flex items-center gap-1'>$product_rating</div>"; // Product rating
            echo "<h1 class='font-raleway font-bold text-3xl mt-3'>$$product_price</h1>"; // Product price
            echo "</div>";
        }
    }
}
