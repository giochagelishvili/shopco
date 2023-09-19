<!DOCTYPE html>
<html lang="en">

<?php include("../../inc/head.php") ?>

<body>
    <div class="bg-black py-2">
        <p class="text-white text-xs text-center">
            Get 20% off of your first order.
            <a href="#" class=" border-b border-b-white">Create your FREE account !</a>
        </p>
    </div>

    <?php include("../../inc/header.php") ?>

    <main>
        <section>
            <div class="products-container grid grid-cols-2 gap-4 p-4 xl:grid-cols-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                <?php
                include("../../classes/product.classes.php");
                $product_obj = new Product();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = $product_obj->display_product("", false, 1, $id, true);
                    print_r($product);
                } else {
                    redirect('shop');
                }
                ?>
            </div>

            <div class="flex items-center my-6 px-6 xl:px-28">
                <button class="show-more-btn w-full font-raleway font-semibold text-center text-lg py-3 rounded-full border border-gray-300 transition-all hover:border-black hover:bg-black hover:text-white">Show More</button>
            </div>
        </section>
    </main>

    <?php include("../../inc/footer.php") ?>
</body>

</html>