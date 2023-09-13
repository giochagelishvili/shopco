<?php

include("dbh.classes.php");

class Product extends Dbh
{
    private function get_product(string $table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function display_product(string $table)
    {
        $products = $this->get_product($table);

        foreach ($products as $product) {
            $product_img = $product["product_img"];
            $product_name = $product["product_name"];
            $product_rating = $product["product_rating"];
            $product_price = $product["product_price"];

            echo "<div class='flex-shrink-0 w-3/5 product-container'>";
            echo "<img src='../uploads/$table/$product_img' alt='product image'>";
            echo "<h1 class='font-raleway font-semibold mt-2'>$product_name</h1>";
            echo "<div class='rating-div flex items-center gap-1'>$product_rating</div>";
            echo "<h1 class='font-raleway font-bold text-3xl mt-3'>$$product_price</h1>";
            echo "</div>";
        }
    }

    private function get_customer_feedback(int $id)
    {
        $sql = "SELECT * FROM customer_feedback";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $feedbacks;
    }

    public function display_feedbacks(int $id)
    {
        $feedbacks = $this->get_customer_feedback($id);

        foreach ($feedbacks as $feedback) {
            $rating = $feedback["feedback_rating"];
            $customer_name = $feedback["customer_name"];
            $customer_verified = $feedback["customer_verified"];
            $customer_feedback = $feedback["customer_feedback"];
        }
    }
}
