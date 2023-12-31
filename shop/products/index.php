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
        <div class="px-4">
            <?php
            include("../../classes/product.classes.php"); // Include product class
            $product = new Product();
            $breadCrumbs = $product->breadcrumbs();

            if (isset($_GET['category'])) {
                $category = $_GET['category'];
            }

            ?>

            <div class="font-raleway">
                <?php echo $breadCrumbs[0] ?>
            </div>

            <div class="flex items-center gap-4 mt-2">
                <h1 class="font-raleway font-semibold text-2xl">
                    <?php echo ucfirst($breadCrumbs[1]); ?>
                </h1>
                <p class="text-xs font-raleway opacity-60">Showing 1-10 of all products</p>
            </div>
        </div>

        <section>
            <div class="products-container grid grid-cols-2 gap-4 p-4 xl:grid-cols-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                <?php
                // Check if the "category" query parameter is set
                if (isset($_GET['category'])) {
                    $product->display_product($category);
                } else {
                    $product->display_product();
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