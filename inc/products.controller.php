<?php

include("../classes/product.classes.php");

if (isset($_POST['limit']) && isset($_POST['category'])) {
    $limit = $_POST['limit'];
    $category = $_POST['category'];
}

$product = new Product();

$product->display_product($category, false, $limit);
