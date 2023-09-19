<?php

// Include database handler class
include("dbh.classes.php");

class Product extends Dbh
{
    // Select products from given table
    private function get_product(string $listing = "")
    {
        if ($listing != "") {
            // Create and prepare SQL query
            $sql = "SELECT * FROM products WHERE listing = ?";
            $stmt = $this->connect()->prepare($sql);

            // Execute query
            if (!$stmt->execute([$listing])) {
                $stmt = null;
                header("location: ../index.php");
                exit();
            }
        } else {
            // Create and prepare SQL query
            $sql = "SELECT * FROM products";
            $stmt = $this->connect()->prepare($sql);

            // Execute query
            if (!$stmt->execute()) {
                $stmt = null;
                header("location: ../index.php");
                exit();
            }
        }

        // Fetch products from the table
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return array of products
        return $products;
    }

    // Display products to page
    public function display_product(string $listing = "", bool $carousel = false)
    {
        // Select products from the database
        $products = $this->get_product($listing);

        // Iterate over products
        foreach ($products as $product) {
            $product_id = $product["id"];
            $product_img = $product["product_img"]; // Product image
            $product_name = $product["product_name"]; // Product name
            $product_rating = $product["product_rating"]; // Product rating in float value (e.g. 4.5)
            $product_price = $product["product_price"]; // Product price in float value (e.g. 120, 118.5)
            $gender = $product["gender"];
            $category = $product["category"];
            $product_listing = $product["listing"];

            if (file_exists("../uploads")) {
                $root = "../";
            } else if (file_exists("../../uploads")) {
                $root = "../../";
            } else {
                redirect("shop");
            }

            // Product container div
            if ($carousel) {
                echo "<a href='$root' class='flex-shrink-0 w-3/5 product-container xl:flex-shrink transition-all hover:scale-105 cursor-pointer'>";
            } else {
                echo "<a href='$root' class='product-container flex flex-col justify-between xl:flex-shrink transition-all hover:scale-105 cursor-pointer'>";
            }

            echo "<div>";
            echo "<img src='" . $root . "uploads/" . "$product_listing/$product_img' alt='product image'>"; // Product image
            echo "<h1 class='font-raleway font-semibold mt-2'>$product_name</h1>"; // Product name
            echo "<div class='rating-div flex items-center gap-1'>$product_rating</div>"; // Product rating
            echo "</div>";
            echo "<h1 class='font-raleway font-bold text-3xl mt-3'>$$product_price</h1>"; // Product price
            echo "</a>";
        }
    }

    public function breadcrumbs()
    {
        // Get the current URL
        $currentURL = $_SERVER['REQUEST_URI'];

        // Remove any query string parameters from the URL
        $currentURL = strtok($currentURL, '?');

        // Split the URL by '/'
        $urlSegments = explode('/', $currentURL);

        // Filter out empty segments and the domain part
        $urlSegments = array_filter($urlSegments, function ($segment) {
            return trim($segment) !== '' && !stristr($segment, 'localhost');
        });

        // Create a breadcrumb trail starting with "Home"
        $breadcrumbTrail = '<a href="/shopco">Home</a>';

        // Flag to track if we have reached the "shop" part
        $reachedShop = false;

        $lastSegment = "";

        // Loop through the URL segments to build the breadcrumb trail
        foreach ($urlSegments as $segment) {
            if ($segment === 'shop' || $segment === 'shopco' && !$reachedShop) {
                // Treat the first "shop" as "Home"
                $reachedShop = true;
                continue;
            }

            $breadcrumbTrail .= ' > <a href="/shopco/shop/' . $segment . '">' . ucfirst($segment) . '</a>';

            $lastSegment = $segment;
        }

        // Initialize the $category variable
        $category = '';

        // Append the $category to the breadcrumb trail if it's set
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            $breadcrumbTrail .= ' > <a href="/shopco/shop/products?category=' . $category . '">' . ucwords(str_replace('_', ' ', $category)) . '</a>';
        }

        return [$breadcrumbTrail, $lastSegment];
    }
}
