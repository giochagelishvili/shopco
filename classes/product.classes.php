<?php

include("dbh.classes.php");

class Product extends Dbh
{
    private function get_new_arrivals()
    {
        $sql = "SELECT * FROM new_arrivals";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $new_arrivals = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $new_arrivals;
    }

    public function display_new_arrivals()
    {
        $new_arrivals = $this->get_new_arrivals();

        foreach ($new_arrivals as $new_arrival) {
            $product_img = $new_arrival["product_img"];
            $product_name = $new_arrival["product_name"];
            $product_rating = $new_arrival["product_rating"];
            $product_price = $new_arrival["product_price"];

            echo "<div class='flex-shrink-0 w-3/5 product-container'>";
            echo "<img src='../uploads/new-arrivals/$product_img' alt='product image'>";
            echo "<h1 class='font-raleway font-semibold mt-2'>$product_name</h1>";
            echo "<div class='rating-div flex items-center gap-1'>$product_rating</div>";
            echo "<h1 class='font-raleway font-bold text-3xl mt-3'>$$product_price</h1>";
            echo "</div>";
        }
    }
}
