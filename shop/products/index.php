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
            <div class="grid grid-cols-2 gap-4 p-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                <?php
                // Check if the "category" query parameter is set
                if (isset($_GET['category'])) {
                    $product->display_product($category);
                } else {
                    $product->display_product();
                }
                ?>
            </div>
        </section>
    </main>

    <?php include("../../inc/footer.php") ?>
</body>

</html>